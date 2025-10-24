<?php
class CustomerController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$data["address"])){
		$errors["address"]="Invalid address";
	}

*/
		if(count($errors)==0){
			$customer=new Customer();
		$customer->name=$data["name"];
		$customer->phone=$data["phone"];
		$customer->email=$data["email"];
		$customer->address=$data["address"];
		$customer->created_at=$data["created_at"];
		$customer->updated_at=$data["updated_at"];

			$customer->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("order",Customer::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$data["address"])){
		$errors["address"]="Invalid address";
	}

*/
		if(count($errors)==0){
			$customer=new Customer();
			$customer->id=$data["id"];
		$customer->name=$data["name"];
		$customer->phone=$data["phone"];
		$customer->email=$data["email"];
		$customer->address=$data["address"];
		$customer->created_at=$data["created_at"];
		$customer->updated_at=$data["updated_at"];

		$customer->update();
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
		Customer::delete($id);
		redirect();
	}
	public function show($id){
		view("order",Customer::find($id));
	}
}
?>
