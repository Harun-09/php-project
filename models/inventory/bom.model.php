<?php
class Bom extends Model implements JsonSerializable
{
	public $id;
	public $bom_code;
	public $product_id;
	public $product_name;
	public $revision_no;
	public $effective_date;
	public $status_id;
	public $created_at;
	public $updated_at;

	public function __construct() {}
	public function set($id, $bom_code, $product_id, $product_name, $revision_no, $effective_date, $status_id, $created_at, $updated_at)
	{
		$this->id = $id;
		$this->bom_code = $bom_code;
		$this->product_id = $product_id;
		$this->product_name = $product_name;
		$this->revision_no = $revision_no;
		$this->effective_date = $effective_date;
		$this->status_id = $status_id;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;
	}
	public function save()
	{
		global $db, $tx;
		$db->query("insert into {$tx}boms(bom_code,product_id,product_name,revision_no,effective_date,status_id,created_at,updated_at)values('$this->bom_code','$this->product_id','$this->product_name','$this->revision_no','$this->effective_date','$this->status_id','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update()
	{
		global $db, $tx;
		$db->query("update {$tx}boms set bom_code='$this->bom_code',product_id='$this->product_id',product_name='$this->product_name',revision_no='$this->revision_no',effective_date='$this->effective_date',status_id='$this->status_id',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id)
	{
		global $db, $tx;
		$db->query("delete from {$tx}boms where id={$id}");
	}
	public function jsonSerialize(): mixed
	{
		return get_object_vars($this);
	}
	public static function all()
	{
		global $db, $tx;
		$result = $db->query("select id,bom_code,product_id,product_name,revision_no,effective_date,status_id,created_at,updated_at from {$tx}boms");
		$data = [];
		while ($bom = $result->fetch_object()) {
			$data[] = $bom;
		}
		return $data;
	}
	public static function pagination($page = 1, $perpage = 10, $criteria = "")
	{
		global $db, $tx;
		$top = ($page - 1) * $perpage;
		$result = $db->query("select id,bom_code,product_id,product_name,revision_no,effective_date,status_id,created_at,updated_at from {$tx}boms $criteria limit $top,$perpage");
		$data = [];
		while ($bom = $result->fetch_object()) {
			$data[] = $bom;
		}
		return $data;
	}
	public static function count($criteria = "")
	{
		global $db, $tx;
		$result = $db->query("select count(*) from {$tx}boms $criteria");
		list($count) = $result->fetch_row();
		return $count;
	}
	public static function find($id)
	{
		global $db, $tx;
		$result = $db->query("SELECT id,bom_code,product_id,product_name,revision_no,effective_date,status_id,created_at,updated_at FROM {$tx}boms WHERE id='$id'");
		$bom = $result->fetch_object();
		return $bom ?? (object)[
			'id' => null,
			'bom_code' => '',
			'product_id' => null,
			'product_name' => '',
			'revision_no' => '',
			'effective_date' => '',
			'status_id' => null,
			'created_at' => '',
			'updated_at' => ''
		];
	}

	static function get_last_id()
	{
		global $db, $tx;
		$result = $db->query("select max(id) last_id from {$tx}boms");
		$bom = $result->fetch_object();
		return $bom->last_id;
	}
	public function json()
	{
		return json_encode($this);
	}
	public function __toString()
	{
		return "		Id:$this->id<br> 
		Bom Code:$this->bom_code<br> 
		Product Id:$this->product_id<br> 
		Product Name:$this->product_name<br> 
		Revision No:$this->revision_no<br> 
		Effective Date:$this->effective_date<br> 
		Status Id:$this->status_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name = "cmbBom")
	{
		global $db, $tx;
		$html = "<select id='$name' name='$name'> ";
		$result = $db->query("select id,name from {$tx}boms");
		while ($bom = $result->fetch_object()) {
			$html .= "<option value ='$bom->id'>$bom->name</option>";
		}
		$html .= "</select>";
		return $html;
	}
	static function html_table($page = 1, $perpage = 10, $criteria = "", $action = true)
	{
		global $db, $tx, $base_url;
		$count_result = $db->query("select count(*) total from {$tx}boms $criteria ");
		list($total_rows) = $count_result->fetch_row();
		$total_pages = ceil($total_rows / $perpage);
		$top = ($page - 1) * $perpage;
		$result = $db->query("select id,bom_code,product_id,product_name,revision_no,effective_date,status_id,created_at,updated_at from {$tx}boms $criteria limit $top,$perpage");
		$html = "<table class='table'>";
		$html .= "<tr><th colspan='3'>" . Html::link(["class" => "btn btn-success", "route" => "bom/create", "text" => "New Bom"]) . "</th></tr>";
		if ($action) {
			$html .= "<tr><th>Id</th><th>Bom Code</th><th>Product Id</th><th>Product Name</th><th>Revision No</th><th>Effective Date</th><th>Status</th><th>Action</th></tr>";
		} else {
			$html .= "<tr><th>Id</th><th>Bom Code</th><th>Product Id</th><th>Product Name</th><th>Revision No</th><th>Effective Date</th><th>Status</th></tr>";
		}
		while ($bom = $result->fetch_object()) {
			$status = Status::find($bom->status_id);
			$action_buttons = "";
			if ($action) {
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons .= Event::button(["name" => "show", "value" => "Show", "class" => "btn btn-info", "route" => "bom/show/$bom->id"]);
				$action_buttons .= Event::button(["name" => "production", "value" => "Production", "class" => "btn btn-primary", "route" => "bom/production/$bom->id"]);

				$action_buttons .= "</div></td>";
			}
			$html .= "<tr><td>$bom->id</td><td>$bom->bom_code</td><td>$bom->product_id</td><td>$bom->product_name</td><td>$bom->revision_no</td><td>$bom->effective_date</td><td>$status->name </td> $action_buttons</tr>";
		}
		$html .= "</table>";
		$html .= pagination($page, $total_pages);
		return $html;
	}
	static function html_row_details($id)
	{
		global $db, $tx, $base_url;
		$result = $db->query("select id,bom_code,product_id,product_name,revision_no,effective_date,status_id,created_at,updated_at from {$tx}boms where id={$id}");
		$bom = $result->fetch_object();
		$html = "<table class='table'>";
		$html .= "<tr><th colspan=\"2\">Bom Show</th></tr>";
		$html .= "<tr><th>Id</th><td>$bom->id</td></tr>";
		$html .= "<tr><th>Bom Code</th><td>$bom->bom_code</td></tr>";
		$html .= "<tr><th>Product Id</th><td>$bom->product_id</td></tr>";
		$html .= "<tr><th>Product Name</th><td>$bom->product_name</td></tr>";
		$html .= "<tr><th>Revision No</th><td>$bom->revision_no</td></tr>";
		$html .= "<tr><th>Effective Date</th><td>$bom->effective_date</td></tr>";
		$html .= "<tr><th>Status Id</th><td>$bom->status_id</td></tr>";
		$html .= "<tr><th>Created At</th><td>$bom->created_at</td></tr>";
		$html .= "<tr><th>Updated At</th><td>$bom->updated_at</td></tr>";

		$html .= "</table>";
		return $html;
	}
}
