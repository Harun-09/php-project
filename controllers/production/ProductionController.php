<?php
class ProductionController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["produced_qty"])){
		$errors["produced_qty"]="Invalid produced_qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["start_date"])){
		$errors["start_date"]="Invalid start_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["end_date"])){
		$errors["end_date"]="Invalid end_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["created_by"])){
		$errors["created_by"]="Invalid created_by";
	}

*/
		if(count($errors)==0){
			$production=new Production();
		$production->product_id=$data["product_id"];
		$production->produced_qty=$data["produced_qty"];
		$production->start_date=$data["start_date"];
		$production->end_date=$data["end_date"];
		$production->created_by=$data["created_by"];
		$production->created_at=$data["created_at"];
		$production->updated_at=$data["updated_at"];

			$production->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("production",Production::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["produced_qty"])){
		$errors["produced_qty"]="Invalid produced_qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["start_date"])){
		$errors["start_date"]="Invalid start_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["end_date"])){
		$errors["end_date"]="Invalid end_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["created_by"])){
		$errors["created_by"]="Invalid created_by";
	}

*/
		if(count($errors)==0){
			$production=new Production();
			$production->id=$data["id"];
		$production->product_id=$data["product_id"];
		$production->produced_qty=$data["produced_qty"];
		$production->start_date=$data["start_date"];
		$production->end_date=$data["end_date"];
		$production->created_by=$data["created_by"];
		$production->created_at=$data["created_at"];
		$production->updated_at=$data["updated_at"];

		$production->update();
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
		Production::delete($id);
		redirect();
	}
	public function show($id){
		view("production",Production::find($id));
	}
}
?>
