<?php
class ExpenseController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["expense_date"])){
		$errors["expense_date"]="Invalid expense_date";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtExpenseCategory"])){
		$errors["expense_category"]="Invalid expense_category";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount"])){
		$errors["amount"]="Invalid amount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCurrency"])){
		$errors["currency"]="Invalid currency";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_by"])){
		$errors["paid_by"]="Invalid paid_by";
	}

*/
		if(count($errors)==0){
			$expense=new Expense();
		$expense->expense_date=$data["expense_date"];
		$expense->expense_category=$data["expense_category"];
		$expense->description=$data["description"];
		$expense->amount=$data["amount"];
		$expense->currency=$data["currency"];
		$expense->paid_by=$data["paid_by"];
		$expense->created_at=$data["created_at"];

			$expense->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",Expense::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["expense_date"])){
		$errors["expense_date"]="Invalid expense_date";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtExpenseCategory"])){
		$errors["expense_category"]="Invalid expense_category";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount"])){
		$errors["amount"]="Invalid amount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCurrency"])){
		$errors["currency"]="Invalid currency";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_by"])){
		$errors["paid_by"]="Invalid paid_by";
	}

*/
		if(count($errors)==0){
			$expense=new Expense();
			$expense->id=$data["id"];
		$expense->expense_date=$data["expense_date"];
		$expense->expense_category=$data["expense_category"];
		$expense->description=$data["description"];
		$expense->amount=$data["amount"];
		$expense->currency=$data["currency"];
		$expense->paid_by=$data["paid_by"];
		$expense->created_at=$data["created_at"];

		$expense->update();
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
		Expense::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",Expense::find($id));
	}
}
?>
