<?php
class ProductionWasteController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["production_order_id"])){
		$errors["production_order_id"]="Invalid production_order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["material_id"])){
		$errors["material_id"]="Invalid material_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtReason"])){
		$errors["reason"]="Invalid reason";
	}
	if(!preg_match("/^[\s\S]+$/",$data["recorded_by"])){
		$errors["recorded_by"]="Invalid recorded_by";
	}
	if(!preg_match("/^[\s\S]+$/",$data["recorded_date"])){
		$errors["recorded_date"]="Invalid recorded_date";
	}

*/
		if(count($errors)==0){
			$productionwaste=new ProductionWaste();
		$productionwaste->production_order_id=$data["production_order_id"];
		$productionwaste->product_id=$data["product_id"];
		$productionwaste->material_id=$data["material_id"];
		$productionwaste->quantity=$data["quantity"];
		$productionwaste->uom_id=$data["uom_id"];
		$productionwaste->reason=$data["reason"];
		$productionwaste->recorded_by=$data["recorded_by"];
		$productionwaste->recorded_date=$data["recorded_date"];
		$productionwaste->created_at=$data["created_at"];

			$productionwaste->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",ProductionWaste::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["production_order_id"])){
		$errors["production_order_id"]="Invalid production_order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["material_id"])){
		$errors["material_id"]="Invalid material_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtReason"])){
		$errors["reason"]="Invalid reason";
	}
	if(!preg_match("/^[\s\S]+$/",$data["recorded_by"])){
		$errors["recorded_by"]="Invalid recorded_by";
	}
	if(!preg_match("/^[\s\S]+$/",$data["recorded_date"])){
		$errors["recorded_date"]="Invalid recorded_date";
	}

*/
		if(count($errors)==0){
			$productionwaste=new ProductionWaste();
			$productionwaste->id=$data["id"];
		$productionwaste->production_order_id=$data["production_order_id"];
		$productionwaste->product_id=$data["product_id"];
		$productionwaste->material_id=$data["material_id"];
		$productionwaste->quantity=$data["quantity"];
		$productionwaste->uom_id=$data["uom_id"];
		$productionwaste->reason=$data["reason"];
		$productionwaste->recorded_by=$data["recorded_by"];
		$productionwaste->recorded_date=$data["recorded_date"];
		$productionwaste->created_at=$data["created_at"];

		$productionwaste->update();
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
		ProductionWaste::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",ProductionWaste::find($id));
	}
}
?>
