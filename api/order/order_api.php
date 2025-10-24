<?php
class OrderApi
{
	public function __construct() {}

	function save($data, $file = [])
	{

		$order = new Order();
		$order->customer_id = $data["customer_id"];
		$order->order_date = date("Y-m-d H:i:s", strtotime($data["order_date"]));
		$order->delivery_date = date("Y-m-d H:i:s", strtotime($data["delivery_date"]));
		$order->shipping_address = $data["shipping_address"];
		$order->shipping_method_id = $data["shipping_method_id"];
		$order->order_total = $data["order_total"];
		$order->warehouse_name = $data["warehouse_name"];
		$order->paid_amount = $data["order_total"];
		$order->status_id = $data["status_id"] ?? 1;
		$order->discount = $data["discount"];
		$order->vat = $data["vat"];
		$order->created_at = date("Y-m-d H:i:s");
		$order->updated_at = date("Y-m-d H:i:s");

		$order_id = $order->save();


		foreach ($data["products"] as $data) {


			$orderdetail = new OrderDetail();
			$orderdetail->order_id = $order_id;
			$orderdetail->product_id = $data["id"];
			$orderdetail->qty = $data["qty"];
			$orderdetail->warehouse_id = $data["warehouse_id"] ?? 1;
			$orderdetail->price = $data["price"];
			$orderdetail->vat = $data["tax"] ?? 0;
			$orderdetail->discount = $data["discount"] ?? 0;
			$orderdetail->created_at = date("Y-m-d H:i:s");
			$orderdetail->updated_at = date("Y-m-d H:i:s");
			$orderdetail->save();


			$stock = new Stock();
			$stock->product_id = $data["id"];
			$stock->qty = $data["qty"]*-1;
			$stock->transaction_type_id = 2;
			$stock->remark = $data["remark"] ?? "Order #$order_id";
			$stock->warehouse_id = $data["warehouse_id"] ?? 1;
			$stock->lot_id = $data["lot_id"] ?? 12345;
			$stock->created_at = date("Y-m-d H:i:s");
			$stock->updated_at = date("Y-m-d H:i:s");
			$stock->save();

			$datauctObj = Product::find($data["id"]);
			if ($datauctObj) {
				$datauctObj->stock_qty -= $data["qty"];
				$datauctObj->updated_at = date("Y-m-d H:i:s");
				$datauctObj->update();
			}
		}

		echo json_encode(["success" => "yes",]);
	}
}
