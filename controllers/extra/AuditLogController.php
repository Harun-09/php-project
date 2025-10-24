<?php
class AuditLogController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtActionType"])){
		$errors["action_type"]="Invalid action_type";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtModuleName"])){
		$errors["module_name"]="Invalid module_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["record_id"])){
		$errors["record_id"]="Invalid record_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtIpAddress"])){
		$errors["ip_address"]="Invalid ip_address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtUserAgent"])){
		$errors["user_agent"]="Invalid user_agent";
	}

*/
		if(count($errors)==0){
			$auditlog=new AuditLog();
		$auditlog->user_id=$data["user_id"];
		$auditlog->action_type=$data["action_type"];
		$auditlog->module_name=$data["module_name"];
		$auditlog->record_id=$data["record_id"];
		$auditlog->description=$data["description"];
		$auditlog->ip_address=$data["ip_address"];
		$auditlog->user_agent=$data["user_agent"];
		$auditlog->created_at=$data["created_at"];

			$auditlog->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",AuditLog::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtActionType"])){
		$errors["action_type"]="Invalid action_type";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtModuleName"])){
		$errors["module_name"]="Invalid module_name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["record_id"])){
		$errors["record_id"]="Invalid record_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtIpAddress"])){
		$errors["ip_address"]="Invalid ip_address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtUserAgent"])){
		$errors["user_agent"]="Invalid user_agent";
	}

*/
		if(count($errors)==0){
			$auditlog=new AuditLog();
			$auditlog->id=$data["id"];
		$auditlog->user_id=$data["user_id"];
		$auditlog->action_type=$data["action_type"];
		$auditlog->module_name=$data["module_name"];
		$auditlog->record_id=$data["record_id"];
		$auditlog->description=$data["description"];
		$auditlog->ip_address=$data["ip_address"];
		$auditlog->user_agent=$data["user_agent"];
		$auditlog->created_at=$data["created_at"];

		$auditlog->update();
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
		AuditLog::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",AuditLog::find($id));
	}
}
?>
