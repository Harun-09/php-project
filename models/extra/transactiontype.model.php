<?php
class TransactionType extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $description;

	public function __construct(){
	}
	public function set($id,$name,$description){
		$this->id=$id;
		$this->name=$name;
		$this->description=$description;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}transaction_types(name,description)values('$this->name','$this->description')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}transaction_types set name='$this->name',description='$this->description' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}transaction_types where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,description from {$tx}transaction_types");
		$data=[];
		while($transactiontype=$result->fetch_object()){
			$data[]=$transactiontype;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,description from {$tx}transaction_types $criteria limit $top,$perpage");
		$data=[];
		while($transactiontype=$result->fetch_object()){
			$data[]=$transactiontype;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}transaction_types $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,description from {$tx}transaction_types where id='$id'");
		$transactiontype=$result->fetch_object();
			return $transactiontype;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}transaction_types");
		$transactiontype =$result->fetch_object();
		return $transactiontype->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Description:$this->description<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbTransactionType"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}transaction_types");
		while($transactiontype=$result->fetch_object()){
			$html.="<option value ='$transactiontype->id'>$transactiontype->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}transaction_types $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,description from {$tx}transaction_types $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"transactiontype/create","text"=>"New TransactionType"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th></tr>";
		}
		while($transactiontype=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"transactiontype/show/$transactiontype->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"transactiontype/edit/$transactiontype->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"transactiontype/confirm/$transactiontype->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$transactiontype->id</td><td>$transactiontype->name</td><td>$transactiontype->description</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,description from {$tx}transaction_types where id={$id}");
		$transactiontype=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">TransactionType Show</th></tr>";
		$html.="<tr><th>Id</th><td>$transactiontype->id</td></tr>";
		$html.="<tr><th>Name</th><td>$transactiontype->name</td></tr>";
		$html.="<tr><th>Description</th><td>$transactiontype->description</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
