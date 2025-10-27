<?php
class ProductionApi
{
	public function __construct() {}

	function index()
	{
		echo json_encode(["productions" => Production::all()]);
	}

	function pagination($data)
	{
		$page = $data["page"] ?? 1;
		$perpage = $data["perpage"] ?? 10;
		echo json_encode([
			"productions" => Production::pagination($page, $perpage),
			"total_records" => Production::count()
		]);
	}

	function find($data)
	{
		echo json_encode(["production" => Production::find($data["id"])]);
	}

	function delete($data)
	{
		Production::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data, $file = [])
	{
		// === Main Production Save ===
		$production = new Production();
		$production->product_id = $data["product_id"];
		$production->produced_qty = $data["produced_qty"];
		$production->start_date = $data["start_date"] ?? date("Y-m-d");
		$production->end_date = $data["end_date"] ?? date("Y-m-d");
		$production->created_by = $data["created_by"] ?? 1;
		$production->created_at = date("Y-m-d H:i:s");
		$production->updated_at = date("Y-m-d H:i:s");
		$production_id = $production->save();

		// === 1️⃣ RAW MATERIAL CONSUMPTION ===
		foreach ($data["components"] as $component) {
			// Save production detail
			$productionDetail = new ProductionDetail();
			$productionDetail->production_id = $production_id;
			$productionDetail->produced_qty = $component["qty"];
			$productionDetail->operator_name = $component["operator_name"] ?? "";
			$productionDetail->remarks = $component["remarks"] ?? "";
			$productionDetail->created_at = date("Y-m-d H:i:s");
			$productionDetail->updated_at = date("Y-m-d H:i:s");
			$productionDetail->save();

			// Raw Material deduction
			$product = Product::find($component["id"]);
			if ($product && $product->is_raw == 1) {
				$productObj = new Product();
				foreach ($product as $key => $value) {
					$productObj->$key = $value;
				}

				// Raw materials কমবে
				$productObj->stock_qty -= floatval($component["qty"]);
				$productObj->updated_at = date("Y-m-d H:i:s");
				$productObj->update();
			}
		}

		$finishedProduct = Product::find($data["product_id"]);
		if ($finishedProduct) {
			$finishedProductObj = new Product();
			foreach ($finishedProduct as $key => $value) {
				$finishedProductObj->$key = $value;
			}

			// Finished product এর stock বাড়বে
			$finishedProductObj->stock_qty += floatval($data["produced_qty"]);
			$finishedProductObj->updated_at = date("Y-m-d H:i:s");
			$finishedProductObj->update();
		}

		// === 3️⃣ STOCK ENTRY ONLY FOR FINISHED PRODUCT ===
		$stock = new Stock();
		$stock->product_id = $data["product_id"];
		$stock->qty = floatval($data["produced_qty"]);
		$stock->transaction_type_id = 1; // production in
		$stock->remark = "Production Output";
		$stock->warehouse_id = $data["warehouse_id"] ?? 1;
		$stock->created_at = date("Y-m-d H:i:s");
		$stock->updated_at = date("Y-m-d H:i:s");
		$stock->lot_id = $data["lot_id"] ?? 12345;
		$stock->save();

		echo json_encode(["success" => "yes", "production_id" => $production_id]);
	}


	function update($data, $file = [])
	{
		$production = Production::find($data["id"]);
		if (!$production) {
			echo json_encode(["success" => "no", "message" => "Production not found"]);
			return;
		}

		$production->product_id = $data["product_id"];
		$production->produced_qty = floatval($data["produced_qty"] ?? $production->produced_qty);
		$production->start_date = $data["start_date"];
		$production->end_date = $data["end_date"];
		$production->updated_at = date("Y-m-d H:i:s");
		$production->update();

		echo json_encode(["success" => "yes"]);
	}
}
