<?php
class TransactionTypeController extends Controller{
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
			$transactiontype=new TransactionType();
		$transactiontype->name=$data["name"];
		$transactiontype->description=$data["description"];

			$transactiontype->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",TransactionType::find($id));
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
			$transactiontype=new TransactionType();
			$transactiontype->id=$data["id"];
		$transactiontype->name=$data["name"];
		$transactiontype->description=$data["description"];

		$transactiontype->update();
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
		TransactionType::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",TransactionType::find($id));
	}
}
?>
