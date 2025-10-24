<?php
class ShippingMethodController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}

*/
		if(count($errors)==0){
			$shippingmethod=new ShippingMethod();
		$shippingmethod->name=$data["name"];
		$shippingmethod->description=$data["description"];

			$shippingmethod->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",ShippingMethod::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}

*/
		if(count($errors)==0){
			$shippingmethod=new ShippingMethod();
			$shippingmethod->id=$data["id"];
		$shippingmethod->name=$data["name"];
		$shippingmethod->description=$data["description"];

		$shippingmethod->update();
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
		ShippingMethod::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",ShippingMethod::find($id));
	}
}
?>
