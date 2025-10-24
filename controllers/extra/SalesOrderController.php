<?php
class SalesOrderController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOrderNumber"])){
		$errors["order_number"]="Invalid order_number";
	}
	if(!preg_match("/^[\s\S]+$/",$data["order_date"])){
		$errors["order_date"]="Invalid order_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["delivery_date"])){
		$errors["delivery_date"]="Invalid delivery_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCurrency"])){
		$errors["currency"]="Invalid currency";
	}
	if(!preg_match("/^[\s\S]+$/",$data["created_by"])){
		$errors["created_by"]="Invalid created_by";
	}

*/
		if(count($errors)==0){
			$salesorder=new SalesOrder();
		$salesorder->customer_id=$data["customer_id"];
		$salesorder->order_number=$data["order_number"];
		$salesorder->order_date=$data["order_date"];
		$salesorder->delivery_date=$data["delivery_date"];
		$salesorder->status=$data["status"];
		$salesorder->total_amount=$data["total_amount"];
		$salesorder->currency=$data["currency"];
		$salesorder->created_by=$data["created_by"];
		$salesorder->created_at=$data["created_at"];

			$salesorder->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",SalesOrder::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOrderNumber"])){
		$errors["order_number"]="Invalid order_number";
	}
	if(!preg_match("/^[\s\S]+$/",$data["order_date"])){
		$errors["order_date"]="Invalid order_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["delivery_date"])){
		$errors["delivery_date"]="Invalid delivery_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCurrency"])){
		$errors["currency"]="Invalid currency";
	}
	if(!preg_match("/^[\s\S]+$/",$data["created_by"])){
		$errors["created_by"]="Invalid created_by";
	}

*/
		if(count($errors)==0){
			$salesorder=new SalesOrder();
			$salesorder->id=$data["id"];
		$salesorder->customer_id=$data["customer_id"];
		$salesorder->order_number=$data["order_number"];
		$salesorder->order_date=$data["order_date"];
		$salesorder->delivery_date=$data["delivery_date"];
		$salesorder->status=$data["status"];
		$salesorder->total_amount=$data["total_amount"];
		$salesorder->currency=$data["currency"];
		$salesorder->created_by=$data["created_by"];
		$salesorder->created_at=$data["created_at"];

		$salesorder->update();
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
		SalesOrder::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",SalesOrder::find($id));
	}
}
?>
