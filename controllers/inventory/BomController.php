<?php
class BomController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBomCode"])){
		$errors["bom_code"]="Invalid bom_code";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtProductName"])){
		$errors["product_name"]="Invalid product_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRevisionNo"])){
		$errors["revision_no"]="Invalid revision_no";
	}
	if(!preg_match("/^[\s\S]+$/",$data["effective_date"])){
		$errors["effective_date"]="Invalid effective_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$bom=new Bom();
		$bom->bom_code=$data["bom_code"];
		$bom->product_id=$data["product_id"];
		$bom->product_name=$data["product_name"];
		$bom->revision_no=$data["revision_no"];
		$bom->effective_date=$data["effective_date"];
		$bom->status_id=$data["status"];
		$bom->created_at=$data["created_at"];
		$bom->updated_at=$data["updated_at"];

			$bom->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function production($id){
		view("inventory",Bom::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBomCode"])){
		$errors["bom_code"]="Invalid bom_code";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtProductName"])){
		$errors["product_name"]="Invalid product_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRevisionNo"])){
		$errors["revision_no"]="Invalid revision_no";
	}
	if(!preg_match("/^[\s\S]+$/",$data["effective_date"])){
		$errors["effective_date"]="Invalid effective_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$bom=new Bom();
			$bom->id=$data["id"];
		$bom->bom_code=$data["bom_code"];
		$bom->product_id=$data["product_id"];
		$bom->product_name=$data["product_name"];
		$bom->revision_no=$data["revision_no"];
		$bom->effective_date=$data["effective_date"];
		$bom->status_id=$data["status"];
		$bom->created_at=$data["created_at"];
		$bom->updated_at=$data["updated_at"];


		$bom->update();
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
		Bom::delete($id);
		redirect();
	}
	public function show($id){
		view("inventory",Bom::find($id));
	}
}
?>
