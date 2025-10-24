<?php
class ShippingMethod extends Model implements JsonSerializable{
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
		$db->query("insert into {$tx}shipping_methods(name,description)values('$this->name','$this->description')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}shipping_methods set name='$this->name',description='$this->description' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}shipping_methods where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,description from {$tx}shipping_methods");
		$data=[];
		while($shippingmethod=$result->fetch_object()){
			$data[]=$shippingmethod;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,description from {$tx}shipping_methods $criteria limit $top,$perpage");
		$data=[];
		while($shippingmethod=$result->fetch_object()){
			$data[]=$shippingmethod;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}shipping_methods $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,description from {$tx}shipping_methods where id='$id'");
		$shippingmethod=$result->fetch_object();
			return $shippingmethod;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}shipping_methods");
		$shippingmethod =$result->fetch_object();
		return $shippingmethod->last_id;
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

	static function html_select($name="cmbShippingMethod"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}shipping_methods");
		while($shippingmethod=$result->fetch_object()){
			$html.="<option value ='$shippingmethod->id'>$shippingmethod->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}shipping_methods $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,description from {$tx}shipping_methods $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"shippingmethod/create","text"=>"New ShippingMethod"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th></tr>";
		}
		while($shippingmethod=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"shippingmethod/show/$shippingmethod->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"shippingmethod/edit/$shippingmethod->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"shippingmethod/confirm/$shippingmethod->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$shippingmethod->id</td><td>$shippingmethod->name</td><td>$shippingmethod->description</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,description from {$tx}shipping_methods where id={$id}");
		$shippingmethod=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ShippingMethod Show</th></tr>";
		$html.="<tr><th>Id</th><td>$shippingmethod->id</td></tr>";
		$html.="<tr><th>Name</th><td>$shippingmethod->name</td></tr>";
		$html.="<tr><th>Description</th><td>$shippingmethod->description</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
