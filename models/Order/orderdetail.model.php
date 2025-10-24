<?php
class OrderDetail extends Model implements JsonSerializable{
	public $id;
	public $order_id;
	public $product_id;
	public $qty;
	public $price;
	public $vat;
	public $discount;
	public $warehouse_id; // নতুন property
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$order_id,$product_id,$qty,$price,$vat,$discount,$warehouse_id,$created_at,$updated_at){
		$this->id=$id;
		$this->order_id=$order_id;
		$this->product_id=$product_id;
		$this->qty=$qty;
		$this->price=$price;
		$this->vat=$vat;
		$this->discount=$discount;
		$this->warehouse_id=$warehouse_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("INSERT INTO {$tx}order_details(order_id,product_id,qty,price,vat,discount,warehouse_id,created_at,updated_at) VALUES('$this->order_id','$this->product_id','$this->qty','$this->price','$this->vat','$this->discount','$this->warehouse_id','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("UPDATE {$tx}order_details SET order_id='$this->order_id',product_id='$this->product_id',qty='$this->qty',price='$this->price',vat='$this->vat',discount='$this->discount',warehouse_id='$this->warehouse_id',created_at='$this->created_at',updated_at='$this->updated_at' WHERE id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("DELETE FROM {$tx}order_details WHERE id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("SELECT id,order_id,product_id,qty,price,vat,discount,warehouse_id,created_at,updated_at FROM {$tx}order_details");
		$data=[];
		while($orderdetail=$result->fetch_object()){
			$data[]=$orderdetail;
		}
		return $data;
	}

	public static function find_by_order_id($id){
		global $db, $tx;
		$result=$db->query("SELECT id,order_id,product_id,qty,price,vat,discount,warehouse_id,created_at FROM {$tx}order_details WHERE order_id = $id");
		$data=[];
		while ($orderdetail=$result->fetch_object()){
			$data[]=$orderdetail;
		}
		return $data;
	}

	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("SELECT id,order_id,product_id,qty,price,vat,discount,warehouse_id,created_at,updated_at FROM {$tx}order_details $criteria LIMIT $top,$perpage");
		$data=[];
		while($orderdetail=$result->fetch_object()){
			$data[]=$orderdetail;
		}
		return $data;
	}
	
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("SELECT COUNT(*) FROM {$tx}order_details $criteria");
		list($count)=$result->fetch_row();
		return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("SELECT id,order_id,product_id,qty,price,vat,discount,warehouse_id,created_at,updated_at FROM {$tx}order_details WHERE id='$id'");
		$orderdetail=$result->fetch_object();
		return $orderdetail;
	}
	public static function find_all_by_order_id($id){
		global $db,$tx;
		$result =$db->query("SELECT id,order_id,product_id,qty,price,vat,discount,warehouse_id,created_at,updated_at FROM {$tx}order_details WHERE order_id='$id'");
		$orderdetail=$result->fetch_all(MYSQLI_ASSOC);
		return $orderdetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("SELECT MAX(id) last_id FROM {$tx}order_details");
		$orderdetail =$result->fetch_object();
		return $orderdetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Order Id:$this->order_id<br> 
		Product Id:$this->product_id<br> 
		Qty:$this->qty<br> 
		Price:$this->price<br> 
		Vat:$this->vat<br> 
		Discount:$this->discount<br> 
		Warehouse Id:$this->warehouse_id<br>
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br>";
	}

	//-------------HTML----------//

	static function html_select($name="cmbOrderDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("SELECT id,name FROM {$tx}order_details");
		while($orderdetail=$result->fetch_object()){
			$html.="<option value ='$orderdetail->id'>$orderdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("SELECT COUNT(*) total FROM {$tx}order_details $criteria");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("SELECT id,order_id,product_id,qty,price,vat,discount,warehouse_id,created_at,updated_at FROM {$tx}order_details $criteria LIMIT $top,$perpage");
		$html="<table class='table'>";
		$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"orderdetail/create","text"=>"New OrderDetail"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Order Id</th><th>Product Id</th><th>Qty</th><th>Price</th><th>Vat</th><th>Discount</th><th>Warehouse Id</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Order Id</th><th>Product Id</th><th>Qty</th><th>Price</th><th>Vat</th><th>Discount</th><th>Warehouse Id</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($orderdetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"orderdetail/show/$orderdetail->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"orderdetail/edit/$orderdetail->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"orderdetail/confirm/$orderdetail->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$orderdetail->id</td><td>$orderdetail->order_id</td><td>$orderdetail->product_id</td><td>$orderdetail->qty</td><td>$orderdetail->price</td><td>$orderdetail->vat</td><td>$orderdetail->discount</td><td>$orderdetail->warehouse_id</td><td>$orderdetail->created_at</td><td>$orderdetail->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("SELECT id,order_id,product_id,qty,price,vat,discount,warehouse_id,created_at,updated_at FROM {$tx}order_details WHERE id={$id}");
		$orderdetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">OrderDetail Show</th></tr>";
		$html.="<tr><th>Id</th><td>$orderdetail->id</td></tr>";
		$html.="<tr><th>Order Id</th><td>$orderdetail->order_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$orderdetail->product_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$orderdetail->qty</td></tr>";
		$html.="<tr><th>Price</th><td>$orderdetail->price</td></tr>";
		$html.="<tr><th>Vat</th><td>$orderdetail->vat</td></tr>";
		$html.="<tr><th>Discount</th><td>$orderdetail->discount</td></tr>";
		$html.="<tr><th>Warehouse Id</th><td>$orderdetail->warehouse_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$orderdetail->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$orderdetail->updated_at</td></tr>";
		$html.="</table>";
		return $html;
	}
}
?>
