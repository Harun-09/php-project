<?php
class BomDetail extends Model implements JsonSerializable
{
	public $id;
	public $bom_id;
	public $raw_material_id;
	public $quantity;
	public $uom;
	public $remarks;
	public $created_at;
	public $updated_at;

	public function __construct() {}
	public function set($id, $bom_id, $raw_material_id, $quantity, $uom, $remarks, $created_at, $updated_at)
	{
		$this->id = $id;
		$this->bom_id = $bom_id;
		$this->raw_material_id = $raw_material_id;
		$this->quantity = $quantity;
		$this->uom = $uom;
		$this->remarks = $remarks;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;
	}
	public function save()
	{
		global $db, $tx;
		$db->query("insert into {$tx}bom_details(bom_id,raw_material_id,quantity,uom,remarks,created_at,updated_at)values('$this->bom_id','$this->raw_material_id','$this->quantity','$this->uom','$this->remarks','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update()
	{
		global $db, $tx;
		$db->query("update {$tx}bom_details set bom_id='$this->bom_id',raw_material_id='$this->raw_material_id',quantity='$this->quantity',uom='$this->uom',remarks='$this->remarks',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id)
	{
		global $db, $tx;
		$db->query("delete from {$tx}bom_details where id={$id}");
	}
	public function jsonSerialize(): mixed
	{
		return get_object_vars($this);
	}
	public static function all()
	{
		global $db, $tx;
		$result = $db->query("select id,bom_id,raw_material_id,quantity,uom,remarks,created_at,updated_at from {$tx}bom_details");
		$data = [];
		while ($bomdetail = $result->fetch_object()) {
			$data[] = $bomdetail;
		}
		return $data;
	}

	public static function find_all_by_product_id($product_id)
	{
		global $db;
		$product_id = (int)$product_id;
		$sql = "SELECT * FROM core_bom_details WHERE bom_id IN (
                    SELECT id FROM core_boms WHERE product_id = {$product_id}
                )";
		return $db->query($sql)->fetch_all(MYSQLI_ASSOC);
	}

	public static function pagination($page = 1, $perpage = 10, $criteria = "")
	{
		global $db, $tx;
		$top = ($page - 1) * $perpage;
		$result = $db->query("select id,bom_id,raw_material_id,quantity,uom,remarks,created_at,updated_at from {$tx}bom_details $criteria limit $top,$perpage");
		$data = [];
		while ($bomdetail = $result->fetch_object()) {
			$data[] = $bomdetail;
		}
		return $data;
	}
	public static function count($criteria = "")
	{
		global $db, $tx;
		$result = $db->query("select count(*) from {$tx}bom_details $criteria");
		list($count) = $result->fetch_row();
		return $count;
	}
	public static function find($id)
	{
		global $db, $tx;
		$result = $db->query("select id,bom_id,raw_material_id,quantity,uom,remarks,created_at,updated_at from {$tx}bom_details where id='$id'");
		$bomdetail = $result->fetch_object();
		return $bomdetail;
	}
	public static function find_all_by_bom_id($id)
	{
		global $db, $tx;
		$result = $db->query("select id,bom_id,raw_material_id,quantity,uom,remarks,created_at,updated_at from {$tx}bom_details where bom_id='$id'");
		$bomdetail = $result->fetch_all(MYSQLI_ASSOC);
		return $bomdetail;
	}
	public static function find_all_by_bom_code($bom_code)
	{
		global $db, $tx;
		$result = $db->query("select id,bom_id,raw_material_id,quantity,uom,remarks,created_at,updated_at from {$tx}bom_details where bom_i='$bom_code'");
		$bomdetail = $result->fetch_all(MYSQLI_ASSOC);
		return $bomdetail;
	}
	static function get_last_id()
	{
		global $db, $tx;
		$result = $db->query("select max(id) last_id from {$tx}bom_details");
		$bomdetail = $result->fetch_object();
		return $bomdetail->last_id;
	}
	public function json()
	{
		return json_encode($this);
	}
	public function __toString()
	{
		return "		Id:$this->id<br> 
		Bom Id:$this->bom_id<br> 
		Product Id:$this->raw_material_id<br> 
		Quantity:$this->quantity<br> 
		Uom:$this->uom<br> 
		Remarks:$this->remarks<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name = "cmbBomDetail")
	{
		global $db, $tx;
		$html = "<select id='$name' name='$name'> ";
		$result = $db->query("select id,name from {$tx}bom_details");
		while ($bomdetail = $result->fetch_object()) {
			$html .= "<option value ='$bomdetail->id'>$bomdetail->name</option>";
		}
		$html .= "</select>";
		return $html;
	}
	static function html_table($page = 1, $perpage = 10, $criteria = "", $action = true)
	{
		global $db, $tx, $base_url;
		$count_result = $db->query("select count(*) total from {$tx}bom_details $criteria ");
		list($total_rows) = $count_result->fetch_row();
		$total_pages = ceil($total_rows / $perpage);
		$top = ($page - 1) * $perpage;
		$result = $db->query("select id,bom_id,raw_material_id,quantity,uom,remarks,created_at,updated_at from {$tx}bom_details $criteria limit $top,$perpage");
		$html = "<table class='table'>";
		$html .= "<tr><th colspan='3'>" . Html::link(["class" => "btn btn-success", "route" => "bomdetail/create", "text" => "New BomDetail"]) . "</th></tr>";
		if ($action) {
			$html .= "<tr><th>Id</th><th>Bom Id</th><th>Product Id</th><th>Quantity</th><th>Uom</th><th>Remarks</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		} else {
			$html .= "<tr><th>Id</th><th>Bom Id</th><th>Product Id</th><th>Quantity</th><th>Uom</th><th>Remarks</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while ($bomdetail = $result->fetch_object()) {
			$action_buttons = "";
			if ($action) {
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons .= Event::button(["name" => "show", "value" => "Show", "class" => "btn btn-info", "route" => "bomdetail/show/$bomdetail->id"]);
				$action_buttons .= Event::button(["name" => "edit", "value" => "Edit", "class" => "btn btn-primary", "route" => "bomdetail/edit/$bomdetail->id"]);
				$action_buttons .= Event::button(["name" => "delete", "value" => "Delete", "class" => "btn btn-danger", "route" => "bomdetail/confirm/$bomdetail->id"]);
				$action_buttons .= "</div></td>";
			}
			$html .= "<tr><td>$bomdetail->id</td><td>$bomdetail->bom_id</td><td>$bomdetail->raw_material_id</td><td>$bomdetail->quantity</td><td>$bomdetail->uom</td><td>$bomdetail->remarks</td><td>$bomdetail->created_at</td><td>$bomdetail->updated_at</td> $action_buttons</tr>";
		}
		$html .= "</table>";
		$html .= pagination($page, $total_pages);
		return $html;
	}
	static function html_row_details($id)
	{
		global $db, $tx, $base_url;
		$result = $db->query("select id,bom_id,raw_material_id,quantity,uom,remarks,created_at,updated_at from {$tx}bom_details where id={$id}");
		$bomdetail = $result->fetch_object();
		$html = "<table class='table'>";
		$html .= "<tr><th colspan=\"2\">BomDetail Show</th></tr>";
		$html .= "<tr><th>Id</th><td>$bomdetail->id</td></tr>";
		$html .= "<tr><th>Bom Id</th><td>$bomdetail->bom_id</td></tr>";
		$html .= "<tr><th>Product Id</th><td>$bomdetail->raw_material_id</td></tr>";
		$html .= "<tr><th>Quantity</th><td>$bomdetail->quantity</td></tr>";
		$html .= "<tr><th>Uom</th><td>$bomdetail->uom</td></tr>";
		$html .= "<tr><th>Remarks</th><td>$bomdetail->remarks</td></tr>";
		$html .= "<tr><th>Created At</th><td>$bomdetail->created_at</td></tr>";
		$html .= "<tr><th>Updated At</th><td>$bomdetail->updated_at</td></tr>";

		$html .= "</table>";
		return $html;
	}
}
