<?php
class ExpenseApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["expenses"=>Expense::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["expenses"=>Expense::pagination($page,$perpage),"total_records"=>Expense::count()]);
	}
	function find($data){
		echo json_encode(["expense"=>Expense::find($data["id"])]);
	}
	function delete($data){
		Expense::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$expense=new Expense();
		$expense->expense_date=$data["expense_date"];
		$expense->expense_category=$data["expense_category"];
		$expense->description=$data["description"];
		$expense->currency=$data["currency"];
		$expense->paid_by=$data["paid_by"];

		$expense->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$expense=new Expense();
		$expense->id=$data["id"];
		$expense->expense_date=$data["expense_date"];
		$expense->expense_category=$data["expense_category"];
		$expense->description=$data["description"];
		$expense->currency=$data["currency"];
		$expense->paid_by=$data["paid_by"];

		$expense->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
