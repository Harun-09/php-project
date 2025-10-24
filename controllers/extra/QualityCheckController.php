<?php
class QualityCheckController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["production_order_id"])){
		$errors["production_order_id"]="Invalid production_order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["checked_by"])){
		$errors["checked_by"]="Invalid checked_by";
	}
	if(!preg_match("/^[\s\S]+$/",$data["check_date"])){
		$errors["check_date"]="Invalid check_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemarks"])){
		$errors["remarks"]="Invalid remarks";
	}

*/
		if(count($errors)==0){
			$qualitycheck=new QualityCheck();
		$qualitycheck->production_order_id=$data["production_order_id"];
		$qualitycheck->product_id=$data["product_id"];
		$qualitycheck->checked_by=$data["checked_by"];
		$qualitycheck->check_date=$data["check_date"];
		$qualitycheck->status=$data["status"];
		$qualitycheck->remarks=$data["remarks"];
		$qualitycheck->created_at=$data["created_at"];

			$qualitycheck->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",QualityCheck::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["production_order_id"])){
		$errors["production_order_id"]="Invalid production_order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["checked_by"])){
		$errors["checked_by"]="Invalid checked_by";
	}
	if(!preg_match("/^[\s\S]+$/",$data["check_date"])){
		$errors["check_date"]="Invalid check_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemarks"])){
		$errors["remarks"]="Invalid remarks";
	}

*/
		if(count($errors)==0){
			$qualitycheck=new QualityCheck();
			$qualitycheck->id=$data["id"];
		$qualitycheck->production_order_id=$data["production_order_id"];
		$qualitycheck->product_id=$data["product_id"];
		$qualitycheck->checked_by=$data["checked_by"];
		$qualitycheck->check_date=$data["check_date"];
		$qualitycheck->status=$data["status"];
		$qualitycheck->remarks=$data["remarks"];
		$qualitycheck->created_at=$data["created_at"];

		$qualitycheck->update();
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
		QualityCheck::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",QualityCheck::find($id));
	}
}
?>
