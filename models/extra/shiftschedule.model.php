<?php
class ShiftSchedule extends Model implements JsonSerializable{
	public $id;
	public $shift_name;
	public $start_time;
	public $end_time;
	public $department_id;
	public $assigned_employee_id;
	public $working_days;
	public $status;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$shift_name,$start_time,$end_time,$department_id,$assigned_employee_id,$working_days,$status,$created_at){
		$this->id=$id;
		$this->shift_name=$shift_name;
		$this->start_time=$start_time;
		$this->end_time=$end_time;
		$this->department_id=$department_id;
		$this->assigned_employee_id=$assigned_employee_id;
		$this->working_days=$working_days;
		$this->status=$status;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}shift_schedules(shift_name,start_time,end_time,department_id,assigned_employee_id,working_days,status,created_at)values('$this->shift_name','$this->start_time','$this->end_time','$this->department_id','$this->assigned_employee_id','$this->working_days','$this->status','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}shift_schedules set shift_name='$this->shift_name',start_time='$this->start_time',end_time='$this->end_time',department_id='$this->department_id',assigned_employee_id='$this->assigned_employee_id',working_days='$this->working_days',status='$this->status',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}shift_schedules where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,shift_name,start_time,end_time,department_id,assigned_employee_id,working_days,status,created_at from {$tx}shift_schedules");
		$data=[];
		while($shiftschedule=$result->fetch_object()){
			$data[]=$shiftschedule;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,shift_name,start_time,end_time,department_id,assigned_employee_id,working_days,status,created_at from {$tx}shift_schedules $criteria limit $top,$perpage");
		$data=[];
		while($shiftschedule=$result->fetch_object()){
			$data[]=$shiftschedule;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}shift_schedules $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,shift_name,start_time,end_time,department_id,assigned_employee_id,working_days,status,created_at from {$tx}shift_schedules where id='$id'");
		$shiftschedule=$result->fetch_object();
			return $shiftschedule;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}shift_schedules");
		$shiftschedule =$result->fetch_object();
		return $shiftschedule->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Shift Name:$this->shift_name<br> 
		Start Time:$this->start_time<br> 
		End Time:$this->end_time<br> 
		Department Id:$this->department_id<br> 
		Assigned Employee Id:$this->assigned_employee_id<br> 
		Working Days:$this->working_days<br> 
		Status:$this->status<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbShiftSchedule"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}shift_schedules");
		while($shiftschedule=$result->fetch_object()){
			$html.="<option value ='$shiftschedule->id'>$shiftschedule->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}shift_schedules $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,shift_name,start_time,end_time,department_id,assigned_employee_id,working_days,status,created_at from {$tx}shift_schedules $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"shiftschedule/create","text"=>"New ShiftSchedule"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Shift Name</th><th>Start Time</th><th>End Time</th><th>Department Id</th><th>Assigned Employee Id</th><th>Working Days</th><th>Status</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Shift Name</th><th>Start Time</th><th>End Time</th><th>Department Id</th><th>Assigned Employee Id</th><th>Working Days</th><th>Status</th><th>Created At</th></tr>";
		}
		while($shiftschedule=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"shiftschedule/show/$shiftschedule->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"shiftschedule/edit/$shiftschedule->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"shiftschedule/confirm/$shiftschedule->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$shiftschedule->id</td><td>$shiftschedule->shift_name</td><td>$shiftschedule->start_time</td><td>$shiftschedule->end_time</td><td>$shiftschedule->department_id</td><td>$shiftschedule->assigned_employee_id</td><td>$shiftschedule->working_days</td><td>$shiftschedule->status</td><td>$shiftschedule->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,shift_name,start_time,end_time,department_id,assigned_employee_id,working_days,status,created_at from {$tx}shift_schedules where id={$id}");
		$shiftschedule=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ShiftSchedule Show</th></tr>";
		$html.="<tr><th>Id</th><td>$shiftschedule->id</td></tr>";
		$html.="<tr><th>Shift Name</th><td>$shiftschedule->shift_name</td></tr>";
		$html.="<tr><th>Start Time</th><td>$shiftschedule->start_time</td></tr>";
		$html.="<tr><th>End Time</th><td>$shiftschedule->end_time</td></tr>";
		$html.="<tr><th>Department Id</th><td>$shiftschedule->department_id</td></tr>";
		$html.="<tr><th>Assigned Employee Id</th><td>$shiftschedule->assigned_employee_id</td></tr>";
		$html.="<tr><th>Working Days</th><td>$shiftschedule->working_days</td></tr>";
		$html.="<tr><th>Status</th><td>$shiftschedule->status</td></tr>";
		$html.="<tr><th>Created At</th><td>$shiftschedule->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
