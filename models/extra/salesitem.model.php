<?php
class SalesItem extends Model implements JsonSerializable{
	public $id;
	public $sales_order_id;
	public $product_id;
	public $quantity;
	public $uom_id;
	public $unit_price;
	public $total_price;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$sales_order_id,$product_id,$quantity,$uom_id,$unit_price,$total_price,$created_at){
		$this->id=$id;
		$this->sales_order_id=$sales_order_id;
		$this->product_id=$product_id;
		$this->quantity=$quantity;
		$this->uom_id=$uom_id;
		$this->unit_price=$unit_price;
		$this->total_price=$total_price;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}sales_items(sales_order_id,product_id,quantity,uom_id,unit_price,total_price,created_at)values('$this->sales_order_id','$this->product_id','$this->quantity','$this->uom_id','$this->unit_price','$this->total_price','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}sales_items set sales_order_id='$this->sales_order_id',product_id='$this->product_id',quantity='$this->quantity',uom_id='$this->uom_id',unit_price='$this->unit_price',total_price='$this->total_price',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}sales_items where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,sales_order_id,product_id,quantity,uom_id,unit_price,total_price,created_at from {$tx}sales_items");
		$data=[];
		while($salesitem=$result->fetch_object()){
			$data[]=$salesitem;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,sales_order_id,product_id,quantity,uom_id,unit_price,total_price,created_at from {$tx}sales_items $criteria limit $top,$perpage");
		$data=[];
		while($salesitem=$result->fetch_object()){
			$data[]=$salesitem;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}sales_items $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,sales_order_id,product_id,quantity,uom_id,unit_price,total_price,created_at from {$tx}sales_items where id='$id'");
		$salesitem=$result->fetch_object();
			return $salesitem;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}sales_items");
		$salesitem =$result->fetch_object();
		return $salesitem->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Sales Order Id:$this->sales_order_id<br> 
		Product Id:$this->product_id<br> 
		Quantity:$this->quantity<br> 
		Uom Id:$this->uom_id<br> 
		Unit Price:$this->unit_price<br> 
		Total Price:$this->total_price<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSalesItem"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}sales_items");
		while($salesitem=$result->fetch_object()){
			$html.="<option value ='$salesitem->id'>$salesitem->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}sales_items $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,sales_order_id,product_id,quantity,uom_id,unit_price,total_price,created_at from {$tx}sales_items $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"salesitem/create","text"=>"New SalesItem"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Sales Order Id</th><th>Product Id</th><th>Quantity</th><th>Uom Id</th><th>Unit Price</th><th>Total Price</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Sales Order Id</th><th>Product Id</th><th>Quantity</th><th>Uom Id</th><th>Unit Price</th><th>Total Price</th><th>Created At</th></tr>";
		}
		while($salesitem=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"salesitem/show/$salesitem->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"salesitem/edit/$salesitem->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"salesitem/confirm/$salesitem->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$salesitem->id</td><td>$salesitem->sales_order_id</td><td>$salesitem->product_id</td><td>$salesitem->quantity</td><td>$salesitem->uom_id</td><td>$salesitem->unit_price</td><td>$salesitem->total_price</td><td>$salesitem->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,sales_order_id,product_id,quantity,uom_id,unit_price,total_price,created_at from {$tx}sales_items where id={$id}");
		$salesitem=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SalesItem Show</th></tr>";
		$html.="<tr><th>Id</th><td>$salesitem->id</td></tr>";
		$html.="<tr><th>Sales Order Id</th><td>$salesitem->sales_order_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$salesitem->product_id</td></tr>";
		$html.="<tr><th>Quantity</th><td>$salesitem->quantity</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$salesitem->uom_id</td></tr>";
		$html.="<tr><th>Unit Price</th><td>$salesitem->unit_price</td></tr>";
		$html.="<tr><th>Total Price</th><td>$salesitem->total_price</td></tr>";
		$html.="<tr><th>Created At</th><td>$salesitem->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
