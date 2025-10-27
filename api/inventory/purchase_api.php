<?php
class PurchaseApi
{
	public function __construct() {}
	function index()
	{
		echo json_encode(["purchases" => Purchase::all()]);
	}
	function pagination($data)
	{
		$page = $data["page"];
		$perpage = $data["perpage"];
		echo json_encode(["purchases" => Purchase::pagination($page, $perpage), "total_records" => Purchase::count()]);
	}
	function find($data)
	{
		echo json_encode(["purchase" => Purchase::find($data["id"])]);
	}
	function delete($data)
	{
		Purchase::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data, $file = [])
	{
		$purchase = new Purchase();
		$purchase->supplier_id = $data["supplier_id"];
		$purchase->purchase_date = $data["purchase_date"];
		$purchase->invoice_no = $data["invoice_no"];
		$purchase->warehouse_name = $data["warehouse_name"];
		$purchase->purchase_total = $data["purchase_total"];
		$purchase->paid_amount = $data["purchase_total"];
		$purchase->remarks = $data["remarks"];
		$purchase->created_at = date("Y-m-d H:i:s");
		$purchase->updated_at = date("Y-m-d H:i:s");

		$purchase_id = $purchase->save();

		foreach ($data["products"] as  $data) {
			$purchasedetail = new PurchaseDetail();
			$purchasedetail->purchase_id = $purchase_id;
			$purchasedetail->product_id = $data["id"];
			$purchasedetail->warehouse_id = $data["warehouse_id"];
			$purchasedetail->qty = $data["qty"];
			$purchasedetail->price = $data["price"];
			$purchasedetail->created_at = date("Y-m-d H:i:s");
			$purchasedetail->updated_at = date("Y-m-d H:i:s");
			$purchasedetail->save();


			// $stock = new Stock();
			// $stock->product_id = $data["id"];
			// $stock->qty = $data["qty"];
			// $stock->transaction_type_id = 1;
			// $stock->remark = $data["remark"] ?? "";
			// $stock->warehouse_id = $data["warehouse_id"];
			// $stock->created_at = date("Y-m-d H:i:s");
			// $stock->updated_at = date("Y-m-d H:i:s");
			// $stock->lot_id = $data["lot_id"] ?? 12345;
			// $stock->save();

			$product = Product::find($data["id"] ?? 0);
			if (!$product) {
				$product = new Product();
				$product->name = $data["name"];
				$product->category_id = $data["category_id"] ?? 0;
				$product->uom_id = $data["uom_id"] ?? 0;
				$product->description = $data["description"] ?? "";
				$product->brand = $data["brand"] ?? "";
				$product->is_raw = $data["is_raw"] ?? 1;
				$product->sku = $data["sku"] ?? "";
				$product->image = $data["image"] ?? "";
				$product->stock_qty = $data["qty"];
				$product->purchase_price = $data["price"];
				$product->created_at = date("Y-m-d H:i:s");
				$product->updated_at = date("Y-m-d H:i:s");
				$product->save();
			} else {
				$productObj = new Product();
				foreach ($product as $key => $value) {
					$productObj->$key = $value;
				}
				$productObj->stock_qty += $data["qty"];
				$productObj->updated_at = date("Y-m-d H:i:s");
				$productObj->update();
			}
		}

		echo json_encode(["success" => "yes"]);
	}

	function update($data, $file = [])
	{
		$purchase = new Purchase();
		$purchase->id = $data["id"];
		$purchase->supplier_id = $data["supplier_id"];
		$purchase->purchase_date = $data["purchase_date"];
		$purchase->invoice_no = $data["invoice_no"];
		$purchase->warehouse_name = $data["warehouse_name"];
		$purchase->purchase_total = $data["purchase_total"];
		$purchase->paid_amount = $data["purchase_total"];
		$purchase->remarks = $data["remarks"];
		$purchase->created_at = date("Y-m-d H:i:s");
		$purchase->updated_at = date("Y-m-d H:i:s");

		$purchase->update();
		echo json_encode(["success" => "yes"]);
	}
}
