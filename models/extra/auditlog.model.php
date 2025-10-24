<?php
class AuditLog extends Model implements JsonSerializable{
	public $id;
	public $user_id;
	public $action_type;
	public $module_name;
	public $record_id;
	public $description;
	public $ip_address;
	public $user_agent;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$user_id,$action_type,$module_name,$record_id,$description,$ip_address,$user_agent,$created_at){
		$this->id=$id;
		$this->user_id=$user_id;
		$this->action_type=$action_type;
		$this->module_name=$module_name;
		$this->record_id=$record_id;
		$this->description=$description;
		$this->ip_address=$ip_address;
		$this->user_agent=$user_agent;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}audit_logs(user_id,action_type,module_name,record_id,description,ip_address,user_agent,created_at)values('$this->user_id','$this->action_type','$this->module_name','$this->record_id','$this->description','$this->ip_address','$this->user_agent','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}audit_logs set user_id='$this->user_id',action_type='$this->action_type',module_name='$this->module_name',record_id='$this->record_id',description='$this->description',ip_address='$this->ip_address',user_agent='$this->user_agent',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}audit_logs where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,user_id,action_type,module_name,record_id,description,ip_address,user_agent,created_at from {$tx}audit_logs");
		$data=[];
		while($auditlog=$result->fetch_object()){
			$data[]=$auditlog;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,user_id,action_type,module_name,record_id,description,ip_address,user_agent,created_at from {$tx}audit_logs $criteria limit $top,$perpage");
		$data=[];
		while($auditlog=$result->fetch_object()){
			$data[]=$auditlog;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}audit_logs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,user_id,action_type,module_name,record_id,description,ip_address,user_agent,created_at from {$tx}audit_logs where id='$id'");
		$auditlog=$result->fetch_object();
			return $auditlog;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}audit_logs");
		$auditlog =$result->fetch_object();
		return $auditlog->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		User Id:$this->user_id<br> 
		Action Type:$this->action_type<br> 
		Module Name:$this->module_name<br> 
		Record Id:$this->record_id<br> 
		Description:$this->description<br> 
		Ip Address:$this->ip_address<br> 
		User Agent:$this->user_agent<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbAuditLog"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}audit_logs");
		while($auditlog=$result->fetch_object()){
			$html.="<option value ='$auditlog->id'>$auditlog->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}audit_logs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,user_id,action_type,module_name,record_id,description,ip_address,user_agent,created_at from {$tx}audit_logs $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"auditlog/create","text"=>"New AuditLog"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>User Id</th><th>Action Type</th><th>Module Name</th><th>Record Id</th><th>Description</th><th>Ip Address</th><th>User Agent</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>User Id</th><th>Action Type</th><th>Module Name</th><th>Record Id</th><th>Description</th><th>Ip Address</th><th>User Agent</th><th>Created At</th></tr>";
		}
		while($auditlog=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"auditlog/show/$auditlog->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"auditlog/edit/$auditlog->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"auditlog/confirm/$auditlog->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$auditlog->id</td><td>$auditlog->user_id</td><td>$auditlog->action_type</td><td>$auditlog->module_name</td><td>$auditlog->record_id</td><td>$auditlog->description</td><td>$auditlog->ip_address</td><td>$auditlog->user_agent</td><td>$auditlog->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,user_id,action_type,module_name,record_id,description,ip_address,user_agent,created_at from {$tx}audit_logs where id={$id}");
		$auditlog=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">AuditLog Show</th></tr>";
		$html.="<tr><th>Id</th><td>$auditlog->id</td></tr>";
		$html.="<tr><th>User Id</th><td>$auditlog->user_id</td></tr>";
		$html.="<tr><th>Action Type</th><td>$auditlog->action_type</td></tr>";
		$html.="<tr><th>Module Name</th><td>$auditlog->module_name</td></tr>";
		$html.="<tr><th>Record Id</th><td>$auditlog->record_id</td></tr>";
		$html.="<tr><th>Description</th><td>$auditlog->description</td></tr>";
		$html.="<tr><th>Ip Address</th><td>$auditlog->ip_address</td></tr>";
		$html.="<tr><th>User Agent</th><td>$auditlog->user_agent</td></tr>";
		$html.="<tr><th>Created At</th><td>$auditlog->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
