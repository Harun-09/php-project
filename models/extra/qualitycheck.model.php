<?php
class QualityCheck extends Model implements JsonSerializable{
	public $id;
	public $production_order_id;
	public $product_id;
	public $checked_by;
	public $check_date;
	public $status;
	public $remarks;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$production_order_id,$product_id,$checked_by,$check_date,$status,$remarks,$created_at){
		$this->id=$id;
		$this->production_order_id=$production_order_id;
		$this->product_id=$product_id;
		$this->checked_by=$checked_by;
		$this->check_date=$check_date;
		$this->status=$status;
		$this->remarks=$remarks;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}quality_checks(production_order_id,product_id,checked_by,check_date,status,remarks,created_at)values('$this->production_order_id','$this->product_id','$this->checked_by','$this->check_date','$this->status','$this->remarks','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}quality_checks set production_order_id='$this->production_order_id',product_id='$this->product_id',checked_by='$this->checked_by',check_date='$this->check_date',status='$this->status',remarks='$this->remarks',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}quality_checks where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,production_order_id,product_id,checked_by,check_date,status,remarks,created_at from {$tx}quality_checks");
		$data=[];
		while($qualitycheck=$result->fetch_object()){
			$data[]=$qualitycheck;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,production_order_id,product_id,checked_by,check_date,status,remarks,created_at from {$tx}quality_checks $criteria limit $top,$perpage");
		$data=[];
		while($qualitycheck=$result->fetch_object()){
			$data[]=$qualitycheck;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}quality_checks $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,production_order_id,product_id,checked_by,check_date,status,remarks,created_at from {$tx}quality_checks where id='$id'");
		$qualitycheck=$result->fetch_object();
			return $qualitycheck;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}quality_checks");
		$qualitycheck =$result->fetch_object();
		return $qualitycheck->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Production Order Id:$this->production_order_id<br> 
		Product Id:$this->product_id<br> 
		Checked By:$this->checked_by<br> 
		Check Date:$this->check_date<br> 
		Status:$this->status<br> 
		Remarks:$this->remarks<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbQualityCheck"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}quality_checks");
		while($qualitycheck=$result->fetch_object()){
			$html.="<option value ='$qualitycheck->id'>$qualitycheck->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}quality_checks $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,production_order_id,product_id,checked_by,check_date,status,remarks,created_at from {$tx}quality_checks $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"qualitycheck/create","text"=>"New QualityCheck"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Production Order Id</th><th>Product Id</th><th>Checked By</th><th>Check Date</th><th>Status</th><th>Remarks</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Production Order Id</th><th>Product Id</th><th>Checked By</th><th>Check Date</th><th>Status</th><th>Remarks</th><th>Created At</th></tr>";
		}
		while($qualitycheck=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"qualitycheck/show/$qualitycheck->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"qualitycheck/edit/$qualitycheck->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"qualitycheck/confirm/$qualitycheck->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$qualitycheck->id</td><td>$qualitycheck->production_order_id</td><td>$qualitycheck->product_id</td><td>$qualitycheck->checked_by</td><td>$qualitycheck->check_date</td><td>$qualitycheck->status</td><td>$qualitycheck->remarks</td><td>$qualitycheck->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,production_order_id,product_id,checked_by,check_date,status,remarks,created_at from {$tx}quality_checks where id={$id}");
		$qualitycheck=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">QualityCheck Show</th></tr>";
		$html.="<tr><th>Id</th><td>$qualitycheck->id</td></tr>";
		$html.="<tr><th>Production Order Id</th><td>$qualitycheck->production_order_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$qualitycheck->product_id</td></tr>";
		$html.="<tr><th>Checked By</th><td>$qualitycheck->checked_by</td></tr>";
		$html.="<tr><th>Check Date</th><td>$qualitycheck->check_date</td></tr>";
		$html.="<tr><th>Status</th><td>$qualitycheck->status</td></tr>";
		$html.="<tr><th>Remarks</th><td>$qualitycheck->remarks</td></tr>";
		$html.="<tr><th>Created At</th><td>$qualitycheck->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
