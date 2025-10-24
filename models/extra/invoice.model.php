<?php
class Invoice extends Model implements JsonSerializable{
	public $id;
	public $sales_order_id;
	public $invoice_number;
	public $invoice_date;
	public $due_date;
	public $total_amount;
	public $status;
	public $currency;
	public $created_by;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$sales_order_id,$invoice_number,$invoice_date,$due_date,$total_amount,$status,$currency,$created_by,$created_at){
		$this->id=$id;
		$this->sales_order_id=$sales_order_id;
		$this->invoice_number=$invoice_number;
		$this->invoice_date=$invoice_date;
		$this->due_date=$due_date;
		$this->total_amount=$total_amount;
		$this->status=$status;
		$this->currency=$currency;
		$this->created_by=$created_by;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}invoices(sales_order_id,invoice_number,invoice_date,due_date,total_amount,status,currency,created_by,created_at)values('$this->sales_order_id','$this->invoice_number','$this->invoice_date','$this->due_date','$this->total_amount','$this->status','$this->currency','$this->created_by','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}invoices set sales_order_id='$this->sales_order_id',invoice_number='$this->invoice_number',invoice_date='$this->invoice_date',due_date='$this->due_date',total_amount='$this->total_amount',status='$this->status',currency='$this->currency',created_by='$this->created_by',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}invoices where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,sales_order_id,invoice_number,invoice_date,due_date,total_amount,status,currency,created_by,created_at from {$tx}invoices");
		$data=[];
		while($invoice=$result->fetch_object()){
			$data[]=$invoice;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,sales_order_id,invoice_number,invoice_date,due_date,total_amount,status,currency,created_by,created_at from {$tx}invoices $criteria limit $top,$perpage");
		$data=[];
		while($invoice=$result->fetch_object()){
			$data[]=$invoice;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}invoices $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,sales_order_id,invoice_number,invoice_date,due_date,total_amount,status,currency,created_by,created_at from {$tx}invoices where id='$id'");
		$invoice=$result->fetch_object();
			return $invoice;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}invoices");
		$invoice =$result->fetch_object();
		return $invoice->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Sales Order Id:$this->sales_order_id<br> 
		Invoice Number:$this->invoice_number<br> 
		Invoice Date:$this->invoice_date<br> 
		Due Date:$this->due_date<br> 
		Total Amount:$this->total_amount<br> 
		Status:$this->status<br> 
		Currency:$this->currency<br> 
		Created By:$this->created_by<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbInvoice"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}invoices");
		while($invoice=$result->fetch_object()){
			$html.="<option value ='$invoice->id'>$invoice->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}invoices $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,sales_order_id,invoice_number,invoice_date,due_date,total_amount,status,currency,created_by,created_at from {$tx}invoices $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"invoice/create","text"=>"New Invoice"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Sales Order Id</th><th>Invoice Number</th><th>Invoice Date</th><th>Due Date</th><th>Total Amount</th><th>Status</th><th>Currency</th><th>Created By</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Sales Order Id</th><th>Invoice Number</th><th>Invoice Date</th><th>Due Date</th><th>Total Amount</th><th>Status</th><th>Currency</th><th>Created By</th><th>Created At</th></tr>";
		}
		while($invoice=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"invoice/show/$invoice->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"invoice/edit/$invoice->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"invoice/confirm/$invoice->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$invoice->id</td><td>$invoice->sales_order_id</td><td>$invoice->invoice_number</td><td>$invoice->invoice_date</td><td>$invoice->due_date</td><td>$invoice->total_amount</td><td>$invoice->status</td><td>$invoice->currency</td><td>$invoice->created_by</td><td>$invoice->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,sales_order_id,invoice_number,invoice_date,due_date,total_amount,status,currency,created_by,created_at from {$tx}invoices where id={$id}");
		$invoice=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Invoice Show</th></tr>";
		$html.="<tr><th>Id</th><td>$invoice->id</td></tr>";
		$html.="<tr><th>Sales Order Id</th><td>$invoice->sales_order_id</td></tr>";
		$html.="<tr><th>Invoice Number</th><td>$invoice->invoice_number</td></tr>";
		$html.="<tr><th>Invoice Date</th><td>$invoice->invoice_date</td></tr>";
		$html.="<tr><th>Due Date</th><td>$invoice->due_date</td></tr>";
		$html.="<tr><th>Total Amount</th><td>$invoice->total_amount</td></tr>";
		$html.="<tr><th>Status</th><td>$invoice->status</td></tr>";
		$html.="<tr><th>Currency</th><td>$invoice->currency</td></tr>";
		$html.="<tr><th>Created By</th><td>$invoice->created_by</td></tr>";
		$html.="<tr><th>Created At</th><td>$invoice->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
