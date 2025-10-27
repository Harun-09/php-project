<?php
class ProductionDetail extends Model implements JsonSerializable{
	public $id;
	public $production_id;
	public $produced_qty;
	public $operator_name;
	public $remarks;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$production_id,$produced_qty,$operator_name,$remarks,$created_at,$updated_at){
		$this->id=$id;
		$this->production_id=$production_id;
		$this->produced_qty=$produced_qty;
		$this->operator_name=$operator_name;
		$this->remarks=$remarks;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}production_details(production_id,produced_qty,operator_name,remarks,created_at,updated_at)values('$this->production_id','$this->produced_qty','$this->operator_name','$this->remarks','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}production_details set production_id='$this->production_id',produced_qty='$this->produced_qty',operator_name='$this->operator_name',remarks='$this->remarks',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}production_details where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,production_id,produced_qty,operator_name,remarks,created_at,updated_at from {$tx}production_details");
		$data=[];
		while($productiondetail=$result->fetch_object()){
			$data[]=$productiondetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,production_id,produced_qty,operator_name,remarks,created_at,updated_at from {$tx}production_details $criteria limit $top,$perpage");
		$data=[];
		while($productiondetail=$result->fetch_object()){
			$data[]=$productiondetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}production_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,production_id,produced_qty,operator_name,remarks,created_at,updated_at from {$tx}production_details where id='$id'");
		$productiondetail=$result->fetch_object();
			return $productiondetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}production_details");
		$productiondetail =$result->fetch_object();
		return $productiondetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Production Id:$this->production_id<br> 
		Produced Qty:$this->produced_qty<br> 
		Operator Name:$this->operator_name<br> 
		Remarks:$this->remarks<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProductionDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}production_details");
		while($productiondetail=$result->fetch_object()){
			$html.="<option value ='$productiondetail->id'>$productiondetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}production_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,production_id,produced_qty,operator_name,remarks,created_at,updated_at from {$tx}production_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"productiondetail/create","text"=>"New ProductionDetail"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Production Id</th><th>Produced Qty</th><th>Operator Name</th><th>Remarks</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Production Id</th><th>Produced Qty</th><th>Operator Name</th><th>Remarks</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($productiondetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"productiondetail/show/$productiondetail->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"productiondetail/edit/$productiondetail->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"productiondetail/confirm/$productiondetail->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$productiondetail->id</td><td>$productiondetail->production_id</td><td>$productiondetail->produced_qty</td><td>$productiondetail->operator_name</td><td>$productiondetail->remarks</td><td>$productiondetail->created_at</td><td>$productiondetail->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,production_id,produced_qty,operator_name,remarks,created_at,updated_at from {$tx}production_details where id={$id}");
		$productiondetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ProductionDetail Show</th></tr>";
		$html.="<tr><th>Id</th><td>$productiondetail->id</td></tr>";
		$html.="<tr><th>Production Id</th><td>$productiondetail->production_id</td></tr>";
		$html.="<tr><th>Produced Qty</th><td>$productiondetail->produced_qty</td></tr>";
		$html.="<tr><th>Operator Name</th><td>$productiondetail->operator_name</td></tr>";
		$html.="<tr><th>Remarks</th><td>$productiondetail->remarks</td></tr>";
		$html.="<tr><th>Created At</th><td>$productiondetail->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$productiondetail->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
