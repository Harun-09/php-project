<?php
class PaymentController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["invoice_id"])){
		$errors["invoice_id"]="Invalid invoice_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_date"])){
		$errors["payment_date"]="Invalid payment_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_amount"])){
		$errors["payment_amount"]="Invalid payment_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method"])){
		$errors["payment_method"]="Invalid payment_method";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPaymentReference"])){
		$errors["payment_reference"]="Invalid payment_reference";
	}
	if(!preg_match("/^[\s\S]+$/",$data["received_by"])){
		$errors["received_by"]="Invalid received_by";
	}

*/
		if(count($errors)==0){
			$payment=new Payment();
		$payment->invoice_id=$data["invoice_id"];
		$payment->payment_date=$data["payment_date"];
		$payment->payment_amount=$data["payment_amount"];
		$payment->payment_method=$data["payment_method"];
		$payment->payment_reference=$data["payment_reference"];
		$payment->received_by=$data["received_by"];
		$payment->created_at=$data["created_at"];

			$payment->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",Payment::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["invoice_id"])){
		$errors["invoice_id"]="Invalid invoice_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_date"])){
		$errors["payment_date"]="Invalid payment_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_amount"])){
		$errors["payment_amount"]="Invalid payment_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method"])){
		$errors["payment_method"]="Invalid payment_method";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPaymentReference"])){
		$errors["payment_reference"]="Invalid payment_reference";
	}
	if(!preg_match("/^[\s\S]+$/",$data["received_by"])){
		$errors["received_by"]="Invalid received_by";
	}

*/
		if(count($errors)==0){
			$payment=new Payment();
			$payment->id=$data["id"];
		$payment->invoice_id=$data["invoice_id"];
		$payment->payment_date=$data["payment_date"];
		$payment->payment_amount=$data["payment_amount"];
		$payment->payment_method=$data["payment_method"];
		$payment->payment_reference=$data["payment_reference"];
		$payment->received_by=$data["received_by"];
		$payment->created_at=$data["created_at"];

		$payment->update();
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
		Payment::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",Payment::find($id));
	}
}
?>
