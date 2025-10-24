<?php
class User extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $full_name;
	public $password;
	public $email;
	public $mobile;
	public $photo;
	public $role_id;
	public $inactive;

	public function __construct(){
	}
	public function set($id,$name,$full_name,$password,$email,$mobile,$photo,$role_id,$inactive){
		$this->id=$id;
		$this->name=$name;
		$this->full_name=$full_name;
		$this->password=$password;
		$this->email=$email;
		$this->mobile=$mobile;
		$this->photo=$photo;
		$this->role_id=$role_id;
		$this->inactive=$inactive;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}users(name,full_name,password,email,mobile,photo,role_id,inactive)values('$this->name','$this->full_name','$this->password','$this->email','$this->mobile','$this->photo','$this->role_id','$this->inactive')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}users set name='$this->name',full_name='$this->full_name',password='$this->password',email='$this->email',mobile='$this->mobile',photo='$this->photo',role_id='$this->role_id',inactive='$this->inactive' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}users where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,full_name,password,email,mobile,photo,role_id,inactive from {$tx}users");
		$data=[];
		while($user=$result->fetch_object()){
			$data[]=$user;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,full_name,password,email,mobile,photo,role_id,inactive from {$tx}users $criteria limit $top,$perpage");
		$data=[];
		while($user=$result->fetch_object()){
			$data[]=$user;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}users $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,full_name,password,email,mobile,photo,role_id,inactive from {$tx}users where id='$id'");
		$user=$result->fetch_object();
			return $user;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}users");
		$user =$result->fetch_object();
		return $user->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Full Name:$this->full_name<br> 
		Password:$this->password<br> 
		Email:$this->email<br> 
		Mobile:$this->mobile<br> 
		Photo:$this->photo<br> 
		Role Id:$this->role_id<br> 
		Inactive:$this->inactive<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbUser"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}users");
		while($user=$result->fetch_object()){
			$html.="<option value ='$user->id'>$user->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}users $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,full_name,password,email,mobile,photo,role_id,inactive from {$tx}users $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"user/create","text"=>"New User"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Full Name</th><th>Password</th><th>Email</th><th>Mobile</th><th>Photo</th><th>Role Id</th><th>Inactive</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Full Name</th><th>Password</th><th>Email</th><th>Mobile</th><th>Photo</th><th>Role Id</th><th>Inactive</th></tr>";
		}
		while($user=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"user/show/$user->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"user/edit/$user->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"user/confirm/$user->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$user->id</td><td>$user->name</td><td>$user->full_name</td><td>$user->password</td><td>$user->email</td><td>$user->mobile</td><td><img src='$base_url/img/$user->photo' width='100' /></td><td>$user->role_id</td><td>$user->inactive</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,full_name,password,email,mobile,photo,role_id,inactive from {$tx}users where id={$id}");
		$user=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">User Show</th></tr>";
		$html.="<tr><th>Id</th><td>$user->id</td></tr>";
		$html.="<tr><th>Name</th><td>$user->name</td></tr>";
		$html.="<tr><th>Full Name</th><td>$user->full_name</td></tr>";
		$html.="<tr><th>Password</th><td>$user->password</td></tr>";
		$html.="<tr><th>Email</th><td>$user->email</td></tr>";
		$html.="<tr><th>Mobile</th><td>$user->mobile</td></tr>";
		$html.="<tr><th>Photo</th><td><img src='$base_url/img/$user->photo' width='100' /></td></tr>";
		$html.="<tr><th>Role Id</th><td>$user->role_id</td></tr>";
		$html.="<tr><th>Inactive</th><td>$user->inactive</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
