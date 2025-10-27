<?php
class ProductionDetailController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("production");
	}
	public function create(){
		view("production");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["production_id"])){
		$errors["production_id"]="Invalid production_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["produced_qty"])){
		$errors["produced_qty"]="Invalid produced_qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOperatorName"])){
		$errors["operator_name"]="Invalid operator_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["remarks"])){
		$errors["remarks"]="Invalid remarks";
	}

*/
		if(count($errors)==0){
			$productiondetail=new ProductionDetail();
		$productiondetail->production_id=$data["production_id"];
		$productiondetail->produced_qty=$data["produced_qty"];
		$productiondetail->operator_name=$data["operator_name"];
		$productiondetail->remarks=$data["remarks"];
		$productiondetail->created_at=$data["created_at"];
		$productiondetail->updated_at=$data["updated_at"];

			$productiondetail->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("production",ProductionDetail::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["production_id"])){
		$errors["production_id"]="Invalid production_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["produced_qty"])){
		$errors["produced_qty"]="Invalid produced_qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOperatorName"])){
		$errors["operator_name"]="Invalid operator_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["remarks"])){
		$errors["remarks"]="Invalid remarks";
	}

*/
		if(count($errors)==0){
			$productiondetail=new ProductionDetail();
			$productiondetail->id=$data["id"];
		$productiondetail->production_id=$data["production_id"];
		$productiondetail->produced_qty=$data["produced_qty"];
		$productiondetail->operator_name=$data["operator_name"];
		$productiondetail->remarks=$data["remarks"];
		$productiondetail->created_at=$data["created_at"];
		$productiondetail->updated_at=$data["updated_at"];

		$productiondetail->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("production");
	}
	public function delete($id){
		ProductionDetail::delete($id);
		redirect();
	}
	public function show($id){
		view("production",ProductionDetail::find($id));
	}
}
?>
