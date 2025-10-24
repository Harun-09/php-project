<?php
class ProductionCost extends Model implements JsonSerializable{
	public $id;
	public $production_order_id;
	public $raw_material_cost;
	public $labor_cost;
	public $overhead_cost;
	public $total_cost;
	public $currency;
	public $recorded_by;
	public $recorded_date;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$production_order_id,$raw_material_cost,$labor_cost,$overhead_cost,$total_cost,$currency,$recorded_by,$recorded_date,$created_at){
		$this->id=$id;
		$this->production_order_id=$production_order_id;
		$this->raw_material_cost=$raw_material_cost;
		$this->labor_cost=$labor_cost;
		$this->overhead_cost=$overhead_cost;
		$this->total_cost=$total_cost;
		$this->currency=$currency;
		$this->recorded_by=$recorded_by;
		$this->recorded_date=$recorded_date;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}production_costs(production_order_id,raw_material_cost,labor_cost,overhead_cost,total_cost,currency,recorded_by,recorded_date,created_at)values('$this->production_order_id','$this->raw_material_cost','$this->labor_cost','$this->overhead_cost','$this->total_cost','$this->currency','$this->recorded_by','$this->recorded_date','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}production_costs set production_order_id='$this->production_order_id',raw_material_cost='$this->raw_material_cost',labor_cost='$this->labor_cost',overhead_cost='$this->overhead_cost',total_cost='$this->total_cost',currency='$this->currency',recorded_by='$this->recorded_by',recorded_date='$this->recorded_date',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}production_costs where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,production_order_id,raw_material_cost,labor_cost,overhead_cost,total_cost,currency,recorded_by,recorded_date,created_at from {$tx}production_costs");
		$data=[];
		while($productioncost=$result->fetch_object()){
			$data[]=$productioncost;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,production_order_id,raw_material_cost,labor_cost,overhead_cost,total_cost,currency,recorded_by,recorded_date,created_at from {$tx}production_costs $criteria limit $top,$perpage");
		$data=[];
		while($productioncost=$result->fetch_object()){
			$data[]=$productioncost;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}production_costs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,production_order_id,raw_material_cost,labor_cost,overhead_cost,total_cost,currency,recorded_by,recorded_date,created_at from {$tx}production_costs where id='$id'");
		$productioncost=$result->fetch_object();
			return $productioncost;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}production_costs");
		$productioncost =$result->fetch_object();
		return $productioncost->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Production Order Id:$this->production_order_id<br> 
		Raw Material Cost:$this->raw_material_cost<br> 
		Labor Cost:$this->labor_cost<br> 
		Overhead Cost:$this->overhead_cost<br> 
		Total Cost:$this->total_cost<br> 
		Currency:$this->currency<br> 
		Recorded By:$this->recorded_by<br> 
		Recorded Date:$this->recorded_date<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProductionCost"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}production_costs");
		while($productioncost=$result->fetch_object()){
			$html.="<option value ='$productioncost->id'>$productioncost->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}production_costs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,production_order_id,raw_material_cost,labor_cost,overhead_cost,total_cost,currency,recorded_by,recorded_date,created_at from {$tx}production_costs $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"productioncost/create","text"=>"New ProductionCost"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Production Order Id</th><th>Raw Material Cost</th><th>Labor Cost</th><th>Overhead Cost</th><th>Total Cost</th><th>Currency</th><th>Recorded By</th><th>Recorded Date</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Production Order Id</th><th>Raw Material Cost</th><th>Labor Cost</th><th>Overhead Cost</th><th>Total Cost</th><th>Currency</th><th>Recorded By</th><th>Recorded Date</th><th>Created At</th></tr>";
		}
		while($productioncost=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"productioncost/show/$productioncost->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"productioncost/edit/$productioncost->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"productioncost/confirm/$productioncost->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$productioncost->id</td><td>$productioncost->production_order_id</td><td>$productioncost->raw_material_cost</td><td>$productioncost->labor_cost</td><td>$productioncost->overhead_cost</td><td>$productioncost->total_cost</td><td>$productioncost->currency</td><td>$productioncost->recorded_by</td><td>$productioncost->recorded_date</td><td>$productioncost->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,production_order_id,raw_material_cost,labor_cost,overhead_cost,total_cost,currency,recorded_by,recorded_date,created_at from {$tx}production_costs where id={$id}");
		$productioncost=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ProductionCost Show</th></tr>";
		$html.="<tr><th>Id</th><td>$productioncost->id</td></tr>";
		$html.="<tr><th>Production Order Id</th><td>$productioncost->production_order_id</td></tr>";
		$html.="<tr><th>Raw Material Cost</th><td>$productioncost->raw_material_cost</td></tr>";
		$html.="<tr><th>Labor Cost</th><td>$productioncost->labor_cost</td></tr>";
		$html.="<tr><th>Overhead Cost</th><td>$productioncost->overhead_cost</td></tr>";
		$html.="<tr><th>Total Cost</th><td>$productioncost->total_cost</td></tr>";
		$html.="<tr><th>Currency</th><td>$productioncost->currency</td></tr>";
		$html.="<tr><th>Recorded By</th><td>$productioncost->recorded_by</td></tr>";
		$html.="<tr><th>Recorded Date</th><td>$productioncost->recorded_date</td></tr>";
		$html.="<tr><th>Created At</th><td>$productioncost->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
