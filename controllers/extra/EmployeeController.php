<?php
class EmployeeController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtFirstName"])){
		$errors["first_name"]="Invalid first_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLastName"])){
		$errors["last_name"]="Invalid last_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtEmployeeCode"])){
		$errors["employee_code"]="Invalid employee_code";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDepartment"])){
		$errors["department"]="Invalid department";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDesignation"])){
		$errors["designation"]="Invalid designation";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$employee=new Employee();
		$employee->first_name=$data["first_name"];
		$employee->last_name=$data["last_name"];
		$employee->employee_code=$data["employee_code"];
		$employee->email=$data["email"];
		$employee->phone=$data["phone"];
		$employee->department=$data["department"];
		$employee->designation=$data["designation"];
		$employee->status=$data["status"];
		$employee->created_at=$data["created_at"];

			$employee->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",Employee::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtFirstName"])){
		$errors["first_name"]="Invalid first_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLastName"])){
		$errors["last_name"]="Invalid last_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtEmployeeCode"])){
		$errors["employee_code"]="Invalid employee_code";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDepartment"])){
		$errors["department"]="Invalid department";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDesignation"])){
		$errors["designation"]="Invalid designation";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$employee=new Employee();
			$employee->id=$data["id"];
		$employee->first_name=$data["first_name"];
		$employee->last_name=$data["last_name"];
		$employee->employee_code=$data["employee_code"];
		$employee->email=$data["email"];
		$employee->phone=$data["phone"];
		$employee->department=$data["department"];
		$employee->designation=$data["designation"];
		$employee->status=$data["status"];
		$employee->created_at=$data["created_at"];

		$employee->update();
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
		Employee::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",Employee::find($id));
	}
}
?>
