<?php
class PurchaseController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("inventory");
	}
	public function create(){
		view("inventory");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["supplier_id"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtInvoiceNo"])){
		$errors["invoice_no"]="Invalid invoice_no";
	}
	if(!preg_match("/^[\s\S]+$/",$data["warehouse_name"])){
		$errors["warehouse_name"]="Invalid warehouse_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["purchase_total"])){
		$errors["purchase_total"]="Invalid purchase_total";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_amount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["vat"])){
		$errors["vat"]="Invalid vat";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemarks"])){
		$errors["remarks"]="Invalid remarks";
	}

*/
		if(count($errors)==0){
			$purchase=new Purchase();
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->purchase_date=date("Y-m-d",strtotime($data["purchase_date"]));
		$purchase->invoice_no=$data["invoice_no"];
		$purchase->warehouse_name=$data["warehouse_name"];
		$purchase->purchase_total=$data["purchase_total"];
		$purchase->paid_amount=$data["paid_amount"];
		$purchase->discount=$data["discount"];
		$purchase->vat=$data["vat"];
		$purchase->remarks=$data["remarks"];
		$purchase->created_at=$data["created_at"];
		$purchase->updated_at=$data["updated_at"];
			$purchase->save();
		redirect();

		
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("inventory",Purchase::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["supplier_id"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtInvoiceNo"])){
		$errors["invoice_no"]="Invalid invoice_no";
	}
	if(!preg_match("/^[\s\S]+$/",$data["warehouse_name"])){
		$errors["warehouse_name"]="Invalid warehouse_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["purchase_total"])){
		$errors["purchase_total"]="Invalid purchase_total";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_amount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["vat"])){
		$errors["vat"]="Invalid vat";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemarks"])){
		$errors["remarks"]="Invalid remarks";
	}

*/
		if(count($errors)==0){
			$purchase=new Purchase();
			$purchase->id=$data["id"];
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->purchase_date=date("Y-m-d",strtotime($data["purchase_date"]));
		$purchase->invoice_no=$data["invoice_no"];
		$purchase->warehouse_name=$data["warehouse_name"];
		$purchase->purchase_total=$data["purchase_total"];
		$purchase->paid_amount=$data["paid_amount"];
		$purchase->discount=$data["discount"];
		$purchase->vat=$data["vat"];
		$purchase->remarks=$data["remarks"];
		$purchase->created_at=$data["created_at"];
		$purchase->updated_at=$data["updated_at"];

		$purchase->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("inventory");
	}
	public function delete($id){
		Purchase::delete($id);
		redirect();
	}
	public function show($id){
		view("inventory",Purchase::find($id));
	}

	
}
?>
