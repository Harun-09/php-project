<?php
class UserController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtFullName"])){
		$errors["full_name"]="Invalid full_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPassword"])){
		$errors["password"]="Invalid password";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!is_valid_mobile($data["mobile"])){
		$errors["mobile"]="Invalid mobile";
	}
	if(!preg_match("/^[\s\S]+$/",$data["photo"])){
		$errors["photo"]="Invalid photo";
	}
	if(!preg_match("/^[\s\S]+$/",$data["role_id"])){
		$errors["role_id"]="Invalid role_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["inactive"])){
		$errors["inactive"]="Invalid inactive";
	}

*/
		if(count($errors)==0){
			$user=new User();
		$user->name=$data["name"];
		$user->full_name=$data["full_name"];
		$user->password = password_hash($data["password"], PASSWORD_DEFAULT);
		$user->email=$data["email"];
		$user->mobile=$data["mobile"];
		$user->photo=File::upload($file["photo"], "img",$data["id"]);
		$user->role_id=$data["role_id"];
		$user->inactive=isset($data["inactive"])?1:0;

			$user->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("extra",User::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtFullName"])){
		$errors["full_name"]="Invalid full_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPassword"])){
		$errors["password"]="Invalid password";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!is_valid_mobile($data["mobile"])){
		$errors["mobile"]="Invalid mobile";
	}
	if(!preg_match("/^[\s\S]+$/",$data["photo"])){
		$errors["photo"]="Invalid photo";
	}
	if(!preg_match("/^[\s\S]+$/",$data["role_id"])){
		$errors["role_id"]="Invalid role_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["inactive"])){
		$errors["inactive"]="Invalid inactive";
	}

*/
		if(count($errors)==0){
			$user=new User();
			$user->id=$data["id"];
		$user->name=$data["name"];
		$user->full_name=$data["full_name"];
		 $user->password = password_hash($data["password"], PASSWORD_DEFAULT);
		$user->email=$data["email"];
		$user->mobile=$data["mobile"];
		if($file["photo"]["name"]!=""){
			$user->photo=File::upload($file["photo"], "img",$data["id"]);
		}else{
			$user->photo=User::find($data["id"])->photo;
		}
		$user->role_id=$data["role_id"];
		$user->inactive=isset($data["inactive"])?1:0;

		$user->update();
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
		User::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",User::find($id));
	}
}
?>
