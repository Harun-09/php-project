<?php
class SalesOrder extends Model implements JsonSerializable{
	public $id;
	public $customer_id;
	public $order_number;
	public $order_date;
	public $delivery_date;
	public $status;
	public $total_amount;
	public $currency;
	public $created_by;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$customer_id,$order_number,$order_date,$delivery_date,$status,$total_amount,$currency,$created_by,$created_at){
		$this->id=$id;
		$this->customer_id=$customer_id;
		$this->order_number=$order_number;
		$this->order_date=$order_date;
		$this->delivery_date=$delivery_date;
		$this->status=$status;
		$this->total_amount=$total_amount;
		$this->currency=$currency;
		$this->created_by=$created_by;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}sales_orders(customer_id,order_number,order_date,delivery_date,status,total_amount,currency,created_by,created_at)values('$this->customer_id','$this->order_number','$this->order_date','$this->delivery_date','$this->status','$this->total_amount','$this->currency','$this->created_by','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}sales_orders set customer_id='$this->customer_id',order_number='$this->order_number',order_date='$this->order_date',delivery_date='$this->delivery_date',status='$this->status',total_amount='$this->total_amount',currency='$this->currency',created_by='$this->created_by',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}sales_orders where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,order_number,order_date,delivery_date,status,total_amount,currency,created_by,created_at from {$tx}sales_orders");
		$data=[];
		while($salesorder=$result->fetch_object()){
			$data[]=$salesorder;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_id,order_number,order_date,delivery_date,status,total_amount,currency,created_by,created_at from {$tx}sales_orders $criteria limit $top,$perpage");
		$data=[];
		while($salesorder=$result->fetch_object()){
			$data[]=$salesorder;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}sales_orders $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_id,order_number,order_date,delivery_date,status,total_amount,currency,created_by,created_at from {$tx}sales_orders where id='$id'");
		$salesorder=$result->fetch_object();
			return $salesorder;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}sales_orders");
		$salesorder =$result->fetch_object();
		return $salesorder->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Id:$this->customer_id<br> 
		Order Number:$this->order_number<br> 
		Order Date:$this->order_date<br> 
		Delivery Date:$this->delivery_date<br> 
		Status:$this->status<br> 
		Total Amount:$this->total_amount<br> 
		Currency:$this->currency<br> 
		Created By:$this->created_by<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSalesOrder"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}sales_orders");
		while($salesorder=$result->fetch_object()){
			$html.="<option value ='$salesorder->id'>$salesorder->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}sales_orders $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_id,order_number,order_date,delivery_date,status,total_amount,currency,created_by,created_at from {$tx}sales_orders $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"salesorder/create","text"=>"New SalesOrder"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Order Number</th><th>Order Date</th><th>Delivery Date</th><th>Status</th><th>Total Amount</th><th>Currency</th><th>Created By</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Order Number</th><th>Order Date</th><th>Delivery Date</th><th>Status</th><th>Total Amount</th><th>Currency</th><th>Created By</th><th>Created At</th></tr>";
		}
		while($salesorder=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"salesorder/show/$salesorder->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"salesorder/edit/$salesorder->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"salesorder/confirm/$salesorder->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$salesorder->id</td><td>$salesorder->customer_id</td><td>$salesorder->order_number</td><td>$salesorder->order_date</td><td>$salesorder->delivery_date</td><td>$salesorder->status</td><td>$salesorder->total_amount</td><td>$salesorder->currency</td><td>$salesorder->created_by</td><td>$salesorder->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_id,order_number,order_date,delivery_date,status,total_amount,currency,created_by,created_at from {$tx}sales_orders where id={$id}");
		$salesorder=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SalesOrder Show</th></tr>";
		$html.="<tr><th>Id</th><td>$salesorder->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$salesorder->customer_id</td></tr>";
		$html.="<tr><th>Order Number</th><td>$salesorder->order_number</td></tr>";
		$html.="<tr><th>Order Date</th><td>$salesorder->order_date</td></tr>";
		$html.="<tr><th>Delivery Date</th><td>$salesorder->delivery_date</td></tr>";
		$html.="<tr><th>Status</th><td>$salesorder->status</td></tr>";
		$html.="<tr><th>Total Amount</th><td>$salesorder->total_amount</td></tr>";
		$html.="<tr><th>Currency</th><td>$salesorder->currency</td></tr>";
		$html.="<tr><th>Created By</th><td>$salesorder->created_by</td></tr>";
		$html.="<tr><th>Created At</th><td>$salesorder->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
