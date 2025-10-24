<?php
class OrderItemController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("extra");
	}
	public function create(){
		view("extra");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["order_id"])){
		$errors["order_id"]="Invalid order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["unit_price"])){
		$errors["unit_price"]="Invalid unit_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_price"])){
		$errors["total_price"]="Invalid total_price";
	}

*/
		if(count($errors)==0){
			$orderitem=new OrderItem();
		$orderitem->order_id=$data["order_id"];
		$orderitem->product_id=$data["product_id"];
		$orderitem->quantity=$data["quantity"];
		$orderitem->unit_price=$data["unit_price"];
		$orderitem->total_price=$data["total_price"];
		$orderitem->created_at=$data["created_at"];
		$orderitem->updated_at=$data["updated_at"];

			$orderitem->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",OrderItem::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["order_id"])){
		$errors["order_id"]="Invalid order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["unit_price"])){
		$errors["unit_price"]="Invalid unit_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_price"])){
		$errors["total_price"]="Invalid total_price";
	}

*/
		if(count($errors)==0){
			$orderitem=new OrderItem();
			$orderitem->id=$data["id"];
		$orderitem->order_id=$data["order_id"];
		$orderitem->product_id=$data["product_id"];
		$orderitem->quantity=$data["quantity"];
		$orderitem->unit_price=$data["unit_price"];
		$orderitem->total_price=$data["total_price"];
		$orderitem->created_at=$data["created_at"];
		$orderitem->updated_at=$data["updated_at"];

		$orderitem->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("extra");
	}
	public function delete($id){
		OrderItem::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",OrderItem::find($id));
	}
}
?>
