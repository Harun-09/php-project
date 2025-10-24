<?php
class UomController extends Controller{
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
			$uom=new Uom();
		$uom->name=$data["name"];
		$uom->code=$data["code"];
		$uom->description=$data["description"];
		$uom->status=$data["status"];
		$uom->created_at=$now;

			$uom->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",Uom::find($id));
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
			$uom=new Uom();
			$uom->id=$data["id"];
		$uom->name=$data["name"];
		$uom->code=$data["code"];
		$uom->description=$data["description"];
		$uom->status=$data["status"];
		$uom->created_at=$now;

		$uom->update();
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
		Uom::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",Uom::find($id));
	}
}
?>
