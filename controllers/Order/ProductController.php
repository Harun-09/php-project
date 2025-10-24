<?php
class ProductController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["category_id"])){
		$errors["category_id"]="Invalid category_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["description"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBrand"])){
		$errors["brand"]="Invalid brand";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSku"])){
		$errors["sku"]="Invalid sku";
	}
	if(!preg_match("/^[\s\S]+$/",$data["tax"])){
		$errors["tax"]="Invalid tax";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtImage"])){
		$errors["image"]="Invalid image";
	}
	if(!preg_match("/^[\s\S]+$/",$data["stock_qty"])){
		$errors["stock_qty"]="Invalid stock_qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["purchase_price"])){
		$errors["purchase_price"]="Invalid purchase_price";
	}

*/
		if(count($errors)==0){
			$product=new Product();
		$product->name=$data["name"];
		$product->category_id=$data["category_id"];
		$product->uom_id=$data["uom_id"];
		$product->description=$data["description"];
		$product->brand=$data["brand"];
		$product->price=$data["price"];
		$product->sku=$data["sku"];
		$product->tax=$data["tax"];
		$product->image=$data["image"];
		$product->stock_qty=$data["stock_qty"];
		$product->purchase_price=$data["purchase_price"];
		$product->created_at=$data["created_at"];
		$product->updated_at=$data["updated_at"];

			$product->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("order",Product::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["category_id"])){
		$errors["category_id"]="Invalid category_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["description"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBrand"])){
		$errors["brand"]="Invalid brand";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSku"])){
		$errors["sku"]="Invalid sku";
	}
	if(!preg_match("/^[\s\S]+$/",$data["tax"])){
		$errors["tax"]="Invalid tax";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtImage"])){
		$errors["image"]="Invalid image";
	}
	if(!preg_match("/^[\s\S]+$/",$data["stock_qty"])){
		$errors["stock_qty"]="Invalid stock_qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["purchase_price"])){
		$errors["purchase_price"]="Invalid purchase_price";
	}

*/
		if(count($errors)==0){
			$product=new Product();
			$product->id=$data["id"];
		$product->name=$data["name"];
		$product->category_id=$data["category_id"];
		$product->uom_id=$data["uom_id"];
		$product->description=$data["description"];
		$product->brand=$data["brand"];
		$product->price=$data["price"];
		$product->sku=$data["sku"];
		$product->tax=$data["tax"];
		$product->image=$data["image"];
		$product->stock_qty=$data["stock_qty"];
		$product->purchase_price=$data["purchase_price"];
		$product->created_at=$data["created_at"];
		$product->updated_at=$data["updated_at"];

		$product->update();
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
		Product::delete($id);
		redirect();
	}
	public function show($id){
		view("order",Product::find($id));
	}
}
?>
