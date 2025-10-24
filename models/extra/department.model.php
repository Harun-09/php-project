<?php
class Department extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $code;
	public $description;
	public $status;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$name,$code,$description,$status,$created_at){
		$this->id=$id;
		$this->name=$name;
		$this->code=$code;
		$this->description=$description;
		$this->status=$status;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}departments(name,code,description,status,created_at)values('$this->name','$this->code','$this->description','$this->status','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}departments set name='$this->name',code='$this->code',description='$this->description',status='$this->status',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}departments where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,code,description,status,created_at from {$tx}departments");
		$data=[];
		while($department=$result->fetch_object()){
			$data[]=$department;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,code,description,status,created_at from {$tx}departments $criteria limit $top,$perpage");
		$data=[];
		while($department=$result->fetch_object()){
			$data[]=$department;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}departments $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,code,description,status,created_at from {$tx}departments where id='$id'");
		$department=$result->fetch_object();
			return $department;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}departments");
		$department =$result->fetch_object();
		return $department->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Code:$this->code<br> 
		Description:$this->description<br> 
		Status:$this->status<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbDepartment"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}departments");
		while($department=$result->fetch_object()){
			$html.="<option value ='$department->id'>$department->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}departments $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,code,description,status,created_at from {$tx}departments $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"department/create","text"=>"New Department"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Code</th><th>Description</th><th>Status</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Code</th><th>Description</th><th>Status</th><th>Created At</th></tr>";
		}
		while($department=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"department/show/$department->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"department/edit/$department->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"department/confirm/$department->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$department->id</td><td>$department->name</td><td>$department->code</td><td>$department->description</td><td>$department->status</td><td>$department->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,code,description,status,created_at from {$tx}departments where id={$id}");
		$department=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Department Show</th></tr>";
		$html.="<tr><th>Id</th><td>$department->id</td></tr>";
		$html.="<tr><th>Name</th><td>$department->name</td></tr>";
		$html.="<tr><th>Code</th><td>$department->code</td></tr>";
		$html.="<tr><th>Description</th><td>$department->description</td></tr>";
		$html.="<tr><th>Status</th><td>$department->status</td></tr>";
		$html.="<tr><th>Created At</th><td>$department->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
