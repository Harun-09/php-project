<?php
class OrderController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("order");
	}
	public function create(){
		view("order");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["shipping_address"])){
		$errors["shipping_address"]="Invalid shipping_address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["shipping_method_id"])){
		$errors["shipping_method_id"]="Invalid shipping_method_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["order_total"])){
		$errors["order_total"]="Invalid order_total";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_amount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["vat"])){
		$errors["vat"]="Invalid vat";
	}

*/
		if(count($errors)==0){
			$order=new Order();
		$order->customer_id=$data["customer_id"];
		$order->order_date=date("Y-m-d",strtotime($data["order_date"]));
		$order->delivery_date=date("Y-m-d",strtotime($data["delivery_date"]));
		$order->shipping_address=$data["shipping_address"];
		$order->shipping_method_id=$data["shipping_method_id"];
		$order->order_total=$data["order_total"];
		$order->warehouse_name=$data["warehouse_name"];
		$order->paid_amount=$data["paid_amount"];
		$order->status_id=$data["status_id"];
		$order->discount=$data["discount"];
		$order->vat=$data["vat"];
		$order->created_at=$data["created_at"];
		$order->updated_at=$data["updated_at"];

			$order->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("order",Order::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["shipping_address"])){
		$errors["shipping_address"]="Invalid shipping_address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["shipping_method_id"])){
		$errors["shipping_method_id"]="Invalid shipping_method_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["order_total"])){
		$errors["order_total"]="Invalid order_total";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_amount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["vat"])){
		$errors["vat"]="Invalid vat";
	}

*/
		if(count($errors)==0){
			$order=new Order();
			$order->id=$data["id"];
		$order->customer_id=$data["customer_id"];
		$order->order_date=date("Y-m-d",strtotime($data["order_date"]));
		$order->delivery_date=date("Y-m-d",strtotime($data["delivery_date"]));
		$order->shipping_address=$data["shipping_address"];
		$order->shipping_method_id=$data["shipping_method_id"];
		$order->order_total=$data["order_total"];
		$order->warehouse_name=$data["warehouse_name"];
		$order->paid_amount=$data["paid_amount"];
		$order->status_id=$data["status_id"];
		$order->discount=$data["discount"];
		$order->vat=$data["vat"];
		$order->created_at=$data["created_at"];
		$order->updated_at=$data["updated_at"];

		$order->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("order");
	}
	public function delete($id){
		Order::delete($id);
		redirect();
	}
	public function show($id){
		view("order",Order::find($id));
	}
}
?>
