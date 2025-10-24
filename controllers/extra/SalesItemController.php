<?php
class SalesItemController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["sales_order_id"])){
		$errors["sales_order_id"]="Invalid sales_order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["unit_price"])){
		$errors["unit_price"]="Invalid unit_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_price"])){
		$errors["total_price"]="Invalid total_price";
	}

*/
		if(count($errors)==0){
			$salesitem=new SalesItem();
		$salesitem->sales_order_id=$data["sales_order_id"];
		$salesitem->product_id=$data["product_id"];
		$salesitem->quantity=$data["quantity"];
		$salesitem->uom_id=$data["uom_id"];
		$salesitem->unit_price=$data["unit_price"];
		$salesitem->total_price=$data["total_price"];
		$salesitem->created_at=$data["created_at"];

			$salesitem->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",SalesItem::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["sales_order_id"])){
		$errors["sales_order_id"]="Invalid sales_order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["unit_price"])){
		$errors["unit_price"]="Invalid unit_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_price"])){
		$errors["total_price"]="Invalid total_price";
	}

*/
		if(count($errors)==0){
			$salesitem=new SalesItem();
			$salesitem->id=$data["id"];
		$salesitem->sales_order_id=$data["sales_order_id"];
		$salesitem->product_id=$data["product_id"];
		$salesitem->quantity=$data["quantity"];
		$salesitem->uom_id=$data["uom_id"];
		$salesitem->unit_price=$data["unit_price"];
		$salesitem->total_price=$data["total_price"];
		$salesitem->created_at=$data["created_at"];

		$salesitem->update();
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
		SalesItem::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",SalesItem::find($id));
	}
}
?>
