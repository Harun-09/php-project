<?php
class WarehouseController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLocation"])){
		$errors["location"]="Invalid location";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$warehouse=new Warehouse();
		$warehouse->name=$data["name"];
		$warehouse->location=$data["location"];
		$warehouse->status=$data["status"];
		$warehouse->created_at=$data["created_at"];
		$warehouse->updated_at=$data["updated_at"];

			$warehouse->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("inventory",Warehouse::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLocation"])){
		$errors["location"]="Invalid location";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$warehouse=new Warehouse();
			$warehouse->id=$data["id"];
		$warehouse->name=$data["name"];
		$warehouse->location=$data["location"];
		$warehouse->status=$data["status"];
		$warehouse->created_at=$data["created_at"];
		$warehouse->updated_at=$data["updated_at"];

		$warehouse->update();
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
		Warehouse::delete($id);
		redirect();
	}
	public function show($id){
		view("inventory",Warehouse::find($id));
	}
}
?>
