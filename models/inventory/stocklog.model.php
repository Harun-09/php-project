<?php
class StockLog extends Model implements JsonSerializable{
	public $id;
	public $stock_id;
	public $transaction_type;
	public $quantity;
	public $reference_id;
	public $note;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$stock_id,$transaction_type,$quantity,$reference_id,$note,$created_at,$updated_at){
		$this->id=$id;
		$this->stock_id=$stock_id;
		$this->transaction_type=$transaction_type;
		$this->quantity=$quantity;
		$this->reference_id=$reference_id;
		$this->note=$note;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock_logs(stock_id,transaction_type,quantity,reference_id,note,created_at,updated_at)values('$this->stock_id','$this->transaction_type','$this->quantity','$this->reference_id','$this->note','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stock_logs set stock_id='$this->stock_id',transaction_type='$this->transaction_type',quantity='$this->quantity',reference_id='$this->reference_id',note='$this->note',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock_logs where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,stock_id,transaction_type,quantity,reference_id,note,created_at,updated_at from {$tx}stock_logs");
		$data=[];
		while($stocklog=$result->fetch_object()){
			$data[]=$stocklog;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,stock_id,transaction_type,quantity,reference_id,note,created_at,updated_at from {$tx}stock_logs $criteria limit $top,$perpage");
		$data=[];
		while($stocklog=$result->fetch_object()){
			$data[]=$stocklog;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stock_logs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,stock_id,transaction_type,quantity,reference_id,note,created_at,updated_at from {$tx}stock_logs where id='$id'");
		$stocklog=$result->fetch_object();
			return $stocklog;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stock_logs");
		$stocklog =$result->fetch_object();
		return $stocklog->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Stock Id:$this->stock_id<br> 
		Transaction Type:$this->transaction_type<br> 
		Quantity:$this->quantity<br> 
		Reference Id:$this->reference_id<br> 
		Note:$this->note<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStockLog"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stock_logs");
		while($stocklog=$result->fetch_object()){
			$html.="<option value ='$stocklog->id'>$stocklog->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}stock_logs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,stock_id,transaction_type,quantity,reference_id,note,created_at,updated_at from {$tx}stock_logs $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"stocklog/create","text"=>"New StockLog"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Stock Id</th><th>Transaction Type</th><th>Quantity</th><th>Reference Id</th><th>Note</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Stock Id</th><th>Transaction Type</th><th>Quantity</th><th>Reference Id</th><th>Note</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($stocklog=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"stocklog/show/$stocklog->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"stocklog/edit/$stocklog->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"stocklog/confirm/$stocklog->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$stocklog->id</td><td>$stocklog->stock_id</td><td>$stocklog->transaction_type</td><td>$stocklog->quantity</td><td>$stocklog->reference_id</td><td>$stocklog->note</td><td>$stocklog->created_at</td><td>$stocklog->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,stock_id,transaction_type,quantity,reference_id,note,created_at,updated_at from {$tx}stock_logs where id={$id}");
		$stocklog=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">StockLog Show</th></tr>";
		$html.="<tr><th>Id</th><td>$stocklog->id</td></tr>";
		$html.="<tr><th>Stock Id</th><td>$stocklog->stock_id</td></tr>";
		$html.="<tr><th>Transaction Type</th><td>$stocklog->transaction_type</td></tr>";
		$html.="<tr><th>Quantity</th><td>$stocklog->quantity</td></tr>";
		$html.="<tr><th>Reference Id</th><td>$stocklog->reference_id</td></tr>";
		$html.="<tr><th>Note</th><td>$stocklog->note</td></tr>";
		$html.="<tr><th>Created At</th><td>$stocklog->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$stocklog->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
