<?php
class InvoiceController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtInvoiceNumber"])){
		$errors["invoice_number"]="Invalid invoice_number";
	}
	if(!preg_match("/^[\s\S]+$/",$data["invoice_date"])){
		$errors["invoice_date"]="Invalid invoice_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["due_date"])){
		$errors["due_date"]="Invalid due_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCurrency"])){
		$errors["currency"]="Invalid currency";
	}
	if(!preg_match("/^[\s\S]+$/",$data["created_by"])){
		$errors["created_by"]="Invalid created_by";
	}

*/
		if(count($errors)==0){
			$invoice=new Invoice();
		$invoice->sales_order_id=$data["sales_order_id"];
		$invoice->invoice_number=$data["invoice_number"];
		$invoice->invoice_date=$data["invoice_date"];
		$invoice->due_date=$data["due_date"];
		$invoice->total_amount=$data["total_amount"];
		$invoice->status=$data["status"];
		$invoice->currency=$data["currency"];
		$invoice->created_by=$data["created_by"];
		$invoice->created_at=$data["created_at"];

			$invoice->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",Invoice::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["sales_order_id"])){
		$errors["sales_order_id"]="Invalid sales_order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtInvoiceNumber"])){
		$errors["invoice_number"]="Invalid invoice_number";
	}
	if(!preg_match("/^[\s\S]+$/",$data["invoice_date"])){
		$errors["invoice_date"]="Invalid invoice_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["due_date"])){
		$errors["due_date"]="Invalid due_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCurrency"])){
		$errors["currency"]="Invalid currency";
	}
	if(!preg_match("/^[\s\S]+$/",$data["created_by"])){
		$errors["created_by"]="Invalid created_by";
	}

*/
		if(count($errors)==0){
			$invoice=new Invoice();
			$invoice->id=$data["id"];
		$invoice->sales_order_id=$data["sales_order_id"];
		$invoice->invoice_number=$data["invoice_number"];
		$invoice->invoice_date=$data["invoice_date"];
		$invoice->due_date=$data["due_date"];
		$invoice->total_amount=$data["total_amount"];
		$invoice->status=$data["status"];
		$invoice->currency=$data["currency"];
		$invoice->created_by=$data["created_by"];
		$invoice->created_at=$data["created_at"];

		$invoice->update();
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
		Invoice::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",Invoice::find($id));
	}
}
?>
