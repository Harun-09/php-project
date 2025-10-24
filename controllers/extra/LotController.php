<?php
class LotController extends Controller{
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
			$lot=new Lot();
		$lot->name=$data["name"];
		$lot->description=$data["description"];
		$lot->created_at=$data["created_at"];
		$lot->updated_at=$data["updated_at"];

			$lot->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",Lot::find($id));
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
			$lot=new Lot();
			$lot->id=$data["id"];
		$lot->name=$data["name"];
		$lot->description=$data["description"];
		$lot->created_at=$data["created_at"];
		$lot->updated_at=$data["updated_at"];

		$lot->update();
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
		Lot::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",Lot::find($id));
	}
}
?>
