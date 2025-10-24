<?php
class StockLogController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["stock_id"])){
		$errors["stock_id"]="Invalid stock_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtTransactionType"])){
		$errors["transaction_type"]="Invalid transaction_type";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["reference_id"])){
		$errors["reference_id"]="Invalid reference_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtNote"])){
		$errors["note"]="Invalid note";
	}

*/
		if(count($errors)==0){
			$stocklog=new StockLog();
		$stocklog->stock_id=$data["stock_id"];
		$stocklog->transaction_type=$data["transaction_type"];
		$stocklog->quantity=$data["quantity"];
		$stocklog->reference_id=$data["reference_id"];
		$stocklog->note=$data["note"];
		$stocklog->created_at=$data["created_at"];
		$stocklog->updated_at=$data["updated_at"];

			$stocklog->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("inventory",StockLog::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["stock_id"])){
		$errors["stock_id"]="Invalid stock_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtTransactionType"])){
		$errors["transaction_type"]="Invalid transaction_type";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["reference_id"])){
		$errors["reference_id"]="Invalid reference_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtNote"])){
		$errors["note"]="Invalid note";
	}

*/
		if(count($errors)==0){
			$stocklog=new StockLog();
			$stocklog->id=$data["id"];
		$stocklog->stock_id=$data["stock_id"];
		$stocklog->transaction_type=$data["transaction_type"];
		$stocklog->quantity=$data["quantity"];
		$stocklog->reference_id=$data["reference_id"];
		$stocklog->note=$data["note"];
		$stocklog->created_at=$data["created_at"];
		$stocklog->updated_at=$data["updated_at"];

		$stocklog->update();
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
		StockLog::delete($id);
		redirect();
	}
	public function show($id){
		view("inventory",StockLog::find($id));
	}
}
?>
