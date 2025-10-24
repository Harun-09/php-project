<?php
class PurchaseDetailController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["purchase_id"])){
		$errors["purchase_id"]="Invalid purchase_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["warehouse_id"])){
		$errors["warehouse_id"]="Invalid warehouse_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total"])){
		$errors["total"]="Invalid total";
	}

*/
		if(count($errors)==0){
			$purchasedetail=new PurchaseDetail();
		$purchasedetail->purchase_id=$data["purchase_id"];
		$purchasedetail->product_id=$data["product_id"];
		$purchasedetail->warehouse_id=$data["warehouse_id"];
		$purchasedetail->qty=$data["qty"];
		$purchasedetail->price=$data["price"];
		$purchasedetail->total=$data["total"];
		$purchasedetail->created_at=$now;
		$purchasedetail->updated_at=$now;

			$purchasedetail->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("inventory",PurchaseDetail::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["purchase_id"])){
		$errors["purchase_id"]="Invalid purchase_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["warehouse_id"])){
		$errors["warehouse_id"]="Invalid warehouse_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total"])){
		$errors["total"]="Invalid total";
	}

*/
		if(count($errors)==0){
			$purchasedetail=new PurchaseDetail();
			$purchasedetail->id=$data["id"];
		$purchasedetail->purchase_id=$data["purchase_id"];
		$purchasedetail->product_id=$data["product_id"];
		$purchasedetail->warehouse_id=$data["warehouse_id"];
		$purchasedetail->qty=$data["qty"];
		$purchasedetail->price=$data["price"];
		$purchasedetail->total=$data["total"];
		$purchasedetail->created_at=$now;
		$purchasedetail->updated_at=$now;

		$purchasedetail->update();
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
		PurchaseDetail::delete($id);
		redirect();
	}
	public function show($id){
		view("inventory",PurchaseDetail::find($id));
	}
}
?>
