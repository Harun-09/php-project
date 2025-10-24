<?php
class ProductionCostController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["raw_material_cost"])){
		$errors["raw_material_cost"]="Invalid raw_material_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$data["labor_cost"])){
		$errors["labor_cost"]="Invalid labor_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$data["overhead_cost"])){
		$errors["overhead_cost"]="Invalid overhead_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_cost"])){
		$errors["total_cost"]="Invalid total_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCurrency"])){
		$errors["currency"]="Invalid currency";
	}
	if(!preg_match("/^[\s\S]+$/",$data["recorded_by"])){
		$errors["recorded_by"]="Invalid recorded_by";
	}
	if(!preg_match("/^[\s\S]+$/",$data["recorded_date"])){
		$errors["recorded_date"]="Invalid recorded_date";
	}

*/
		if(count($errors)==0){
			$productioncost=new ProductionCost();
		$productioncost->production_order_id=$data["production_order_id"];
		$productioncost->raw_material_cost=$data["raw_material_cost"];
		$productioncost->labor_cost=$data["labor_cost"];
		$productioncost->overhead_cost=$data["overhead_cost"];
		$productioncost->total_cost=$data["total_cost"];
		$productioncost->currency=$data["currency"];
		$productioncost->recorded_by=$data["recorded_by"];
		$productioncost->recorded_date=$data["recorded_date"];
		$productioncost->created_at=$data["created_at"];

			$productioncost->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",ProductionCost::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["production_order_id"])){
		$errors["production_order_id"]="Invalid production_order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["raw_material_cost"])){
		$errors["raw_material_cost"]="Invalid raw_material_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$data["labor_cost"])){
		$errors["labor_cost"]="Invalid labor_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$data["overhead_cost"])){
		$errors["overhead_cost"]="Invalid overhead_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_cost"])){
		$errors["total_cost"]="Invalid total_cost";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCurrency"])){
		$errors["currency"]="Invalid currency";
	}
	if(!preg_match("/^[\s\S]+$/",$data["recorded_by"])){
		$errors["recorded_by"]="Invalid recorded_by";
	}
	if(!preg_match("/^[\s\S]+$/",$data["recorded_date"])){
		$errors["recorded_date"]="Invalid recorded_date";
	}

*/
		if(count($errors)==0){
			$productioncost=new ProductionCost();
			$productioncost->id=$data["id"];
		$productioncost->production_order_id=$data["production_order_id"];
		$productioncost->raw_material_cost=$data["raw_material_cost"];
		$productioncost->labor_cost=$data["labor_cost"];
		$productioncost->overhead_cost=$data["overhead_cost"];
		$productioncost->total_cost=$data["total_cost"];
		$productioncost->currency=$data["currency"];
		$productioncost->recorded_by=$data["recorded_by"];
		$productioncost->recorded_date=$data["recorded_date"];
		$productioncost->created_at=$data["created_at"];

		$productioncost->update();
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
		ProductionCost::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",ProductionCost::find($id));
	}
}
?>
