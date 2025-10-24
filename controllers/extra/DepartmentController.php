<?php
class DepartmentController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCode"])){
		$errors["code"]="Invalid code";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$department=new Department();
		$department->name=$data["name"];
		$department->code=$data["code"];
		$department->description=$data["description"];
		$department->status=$data["status"];
		$department->created_at=$data["created_at"];

			$department->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",Department::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCode"])){
		$errors["code"]="Invalid code";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$department=new Department();
			$department->id=$data["id"];
		$department->name=$data["name"];
		$department->code=$data["code"];
		$department->description=$data["description"];
		$department->status=$data["status"];
		$department->created_at=$data["created_at"];

		$department->update();
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
		Department::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",Department::find($id));
	}
}
?>
