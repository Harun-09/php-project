<?php
class ProductionWaste extends Model implements JsonSerializable{
	public $id;
	public $production_order_id;
	public $product_id;
	public $material_id;
	public $quantity;
	public $uom_id;
	public $reason;
	public $recorded_by;
	public $recorded_date;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$production_order_id,$product_id,$material_id,$quantity,$uom_id,$reason,$recorded_by,$recorded_date,$created_at){
		$this->id=$id;
		$this->production_order_id=$production_order_id;
		$this->product_id=$product_id;
		$this->material_id=$material_id;
		$this->quantity=$quantity;
		$this->uom_id=$uom_id;
		$this->reason=$reason;
		$this->recorded_by=$recorded_by;
		$this->recorded_date=$recorded_date;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}production_wastes(production_order_id,product_id,material_id,quantity,uom_id,reason,recorded_by,recorded_date,created_at)values('$this->production_order_id','$this->product_id','$this->material_id','$this->quantity','$this->uom_id','$this->reason','$this->recorded_by','$this->recorded_date','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}production_wastes set production_order_id='$this->production_order_id',product_id='$this->product_id',material_id='$this->material_id',quantity='$this->quantity',uom_id='$this->uom_id',reason='$this->reason',recorded_by='$this->recorded_by',recorded_date='$this->recorded_date',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}production_wastes where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,production_order_id,product_id,material_id,quantity,uom_id,reason,recorded_by,recorded_date,created_at from {$tx}production_wastes");
		$data=[];
		while($productionwaste=$result->fetch_object()){
			$data[]=$productionwaste;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,production_order_id,product_id,material_id,quantity,uom_id,reason,recorded_by,recorded_date,created_at from {$tx}production_wastes $criteria limit $top,$perpage");
		$data=[];
		while($productionwaste=$result->fetch_object()){
			$data[]=$productionwaste;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}production_wastes $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,production_order_id,product_id,material_id,quantity,uom_id,reason,recorded_by,recorded_date,created_at from {$tx}production_wastes where id='$id'");
		$productionwaste=$result->fetch_object();
			return $productionwaste;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}production_wastes");
		$productionwaste =$result->fetch_object();
		return $productionwaste->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Production Order Id:$this->production_order_id<br> 
		Product Id:$this->product_id<br> 
		Material Id:$this->material_id<br> 
		Quantity:$this->quantity<br> 
		Uom Id:$this->uom_id<br> 
		Reason:$this->reason<br> 
		Recorded By:$this->recorded_by<br> 
		Recorded Date:$this->recorded_date<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProductionWaste"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}production_wastes");
		while($productionwaste=$result->fetch_object()){
			$html.="<option value ='$productionwaste->id'>$productionwaste->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}production_wastes $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,production_order_id,product_id,material_id,quantity,uom_id,reason,recorded_by,recorded_date,created_at from {$tx}production_wastes $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"productionwaste/create","text"=>"New ProductionWaste"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Production Order Id</th><th>Product Id</th><th>Material Id</th><th>Quantity</th><th>Uom Id</th><th>Reason</th><th>Recorded By</th><th>Recorded Date</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Production Order Id</th><th>Product Id</th><th>Material Id</th><th>Quantity</th><th>Uom Id</th><th>Reason</th><th>Recorded By</th><th>Recorded Date</th><th>Created At</th></tr>";
		}
		while($productionwaste=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"productionwaste/show/$productionwaste->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"productionwaste/edit/$productionwaste->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"productionwaste/confirm/$productionwaste->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$productionwaste->id</td><td>$productionwaste->production_order_id</td><td>$productionwaste->product_id</td><td>$productionwaste->material_id</td><td>$productionwaste->quantity</td><td>$productionwaste->uom_id</td><td>$productionwaste->reason</td><td>$productionwaste->recorded_by</td><td>$productionwaste->recorded_date</td><td>$productionwaste->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,production_order_id,product_id,material_id,quantity,uom_id,reason,recorded_by,recorded_date,created_at from {$tx}production_wastes where id={$id}");
		$productionwaste=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ProductionWaste Show</th></tr>";
		$html.="<tr><th>Id</th><td>$productionwaste->id</td></tr>";
		$html.="<tr><th>Production Order Id</th><td>$productionwaste->production_order_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$productionwaste->product_id</td></tr>";
		$html.="<tr><th>Material Id</th><td>$productionwaste->material_id</td></tr>";
		$html.="<tr><th>Quantity</th><td>$productionwaste->quantity</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$productionwaste->uom_id</td></tr>";
		$html.="<tr><th>Reason</th><td>$productionwaste->reason</td></tr>";
		$html.="<tr><th>Recorded By</th><td>$productionwaste->recorded_by</td></tr>";
		$html.="<tr><th>Recorded Date</th><td>$productionwaste->recorded_date</td></tr>";
		$html.="<tr><th>Created At</th><td>$productionwaste->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
