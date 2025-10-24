<?php
class ShiftScheduleController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtShiftName"])){
		$errors["shift_name"]="Invalid shift_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["start_time"])){
		$errors["start_time"]="Invalid start_time";
	}
	if(!preg_match("/^[\s\S]+$/",$data["end_time"])){
		$errors["end_time"]="Invalid end_time";
	}
	if(!preg_match("/^[\s\S]+$/",$data["department_id"])){
		$errors["department_id"]="Invalid department_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["assigned_employee_id"])){
		$errors["assigned_employee_id"]="Invalid assigned_employee_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtWorkingDays"])){
		$errors["working_days"]="Invalid working_days";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$shiftschedule=new ShiftSchedule();
		$shiftschedule->shift_name=$data["shift_name"];
		$shiftschedule->start_time=$data["start_time"];
		$shiftschedule->end_time=$data["end_time"];
		$shiftschedule->department_id=$data["department_id"];
		$shiftschedule->assigned_employee_id=$data["assigned_employee_id"];
		$shiftschedule->working_days=$data["working_days"];
		$shiftschedule->status=$data["status"];
		$shiftschedule->created_at=$data["created_at"];

			$shiftschedule->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",ShiftSchedule::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtShiftName"])){
		$errors["shift_name"]="Invalid shift_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["start_time"])){
		$errors["start_time"]="Invalid start_time";
	}
	if(!preg_match("/^[\s\S]+$/",$data["end_time"])){
		$errors["end_time"]="Invalid end_time";
	}
	if(!preg_match("/^[\s\S]+$/",$data["department_id"])){
		$errors["department_id"]="Invalid department_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["assigned_employee_id"])){
		$errors["assigned_employee_id"]="Invalid assigned_employee_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtWorkingDays"])){
		$errors["working_days"]="Invalid working_days";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$shiftschedule=new ShiftSchedule();
			$shiftschedule->id=$data["id"];
		$shiftschedule->shift_name=$data["shift_name"];
		$shiftschedule->start_time=$data["start_time"];
		$shiftschedule->end_time=$data["end_time"];
		$shiftschedule->department_id=$data["department_id"];
		$shiftschedule->assigned_employee_id=$data["assigned_employee_id"];
		$shiftschedule->working_days=$data["working_days"];
		$shiftschedule->status=$data["status"];
		$shiftschedule->created_at=$data["created_at"];

		$shiftschedule->update();
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
		ShiftSchedule::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",ShiftSchedule::find($id));
	}
}
?>
