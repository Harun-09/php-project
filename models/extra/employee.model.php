<?php
class Employee extends Model implements JsonSerializable{
	public $id;
	public $first_name;
	public $last_name;
	public $employee_code;
	public $email;
	public $phone;
	public $department;
	public $designation;
	public $status;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$first_name,$last_name,$employee_code,$email,$phone,$department,$designation,$status,$created_at){
		$this->id=$id;
		$this->first_name=$first_name;
		$this->last_name=$last_name;
		$this->employee_code=$employee_code;
		$this->email=$email;
		$this->phone=$phone;
		$this->department=$department;
		$this->designation=$designation;
		$this->status=$status;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}employees(first_name,last_name,employee_code,email,phone,department,designation,status,created_at)values('$this->first_name','$this->last_name','$this->employee_code','$this->email','$this->phone','$this->department','$this->designation','$this->status','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}employees set first_name='$this->first_name',last_name='$this->last_name',employee_code='$this->employee_code',email='$this->email',phone='$this->phone',department='$this->department',designation='$this->designation',status='$this->status',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}employees where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,first_name,last_name,employee_code,email,phone,department,designation,status,created_at from {$tx}employees");
		$data=[];
		while($employee=$result->fetch_object()){
			$data[]=$employee;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,first_name,last_name,employee_code,email,phone,department,designation,status,created_at from {$tx}employees $criteria limit $top,$perpage");
		$data=[];
		while($employee=$result->fetch_object()){
			$data[]=$employee;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}employees $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,first_name,last_name,employee_code,email,phone,department,designation,status,created_at from {$tx}employees where id='$id'");
		$employee=$result->fetch_object();
			return $employee;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}employees");
		$employee =$result->fetch_object();
		return $employee->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		First Name:$this->first_name<br> 
		Last Name:$this->last_name<br> 
		Employee Code:$this->employee_code<br> 
		Email:$this->email<br> 
		Phone:$this->phone<br> 
		Department:$this->department<br> 
		Designation:$this->designation<br> 
		Status:$this->status<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbEmployee"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}employees");
		while($employee=$result->fetch_object()){
			$html.="<option value ='$employee->id'>$employee->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}employees $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,first_name,last_name,employee_code,email,phone,department,designation,status,created_at from {$tx}employees $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"employee/create","text"=>"New Employee"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Employee Code</th><th>Email</th><th>Phone</th><th>Department</th><th>Designation</th><th>Status</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Employee Code</th><th>Email</th><th>Phone</th><th>Department</th><th>Designation</th><th>Status</th><th>Created At</th></tr>";
		}
		while($employee=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"employee/show/$employee->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"employee/edit/$employee->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"employee/confirm/$employee->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$employee->id</td><td>$employee->first_name</td><td>$employee->last_name</td><td>$employee->employee_code</td><td>$employee->email</td><td>$employee->phone</td><td>$employee->department</td><td>$employee->designation</td><td>$employee->status</td><td>$employee->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,first_name,last_name,employee_code,email,phone,department,designation,status,created_at from {$tx}employees where id={$id}");
		$employee=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Employee Show</th></tr>";
		$html.="<tr><th>Id</th><td>$employee->id</td></tr>";
		$html.="<tr><th>First Name</th><td>$employee->first_name</td></tr>";
		$html.="<tr><th>Last Name</th><td>$employee->last_name</td></tr>";
		$html.="<tr><th>Employee Code</th><td>$employee->employee_code</td></tr>";
		$html.="<tr><th>Email</th><td>$employee->email</td></tr>";
		$html.="<tr><th>Phone</th><td>$employee->phone</td></tr>";
		$html.="<tr><th>Department</th><td>$employee->department</td></tr>";
		$html.="<tr><th>Designation</th><td>$employee->designation</td></tr>";
		$html.="<tr><th>Status</th><td>$employee->status</td></tr>";
		$html.="<tr><th>Created At</th><td>$employee->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
