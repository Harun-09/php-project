<?php
class Expense extends Model implements JsonSerializable
{
	public $id;
	public $expense_date;
	public $expense_category;
	public $description;
	public $amount;
	public $currency;
	public $paid_by;
	public $created_at;

	public function __construct() {}
	public function set($id, $expense_date, $expense_category, $description, $amount, $currency, $paid_by, $created_at)
	{
		$this->id = $id;
		$this->expense_date = $expense_date;
		$this->expense_category = $expense_category;
		$this->description = $description;
		$this->amount = $amount;
		$this->currency = $currency;
		$this->paid_by = $paid_by;
		$this->created_at = $created_at;
	}
	public function save()
	{
		global $db, $tx;
		$db->query("insert into {$tx}expenses(expense_date,expense_category,description,amount,currency,paid_by,created_at)values('$this->expense_date','$this->expense_category','$this->description','$this->amount','$this->currency','$this->paid_by','$this->created_at')");
		return $db->insert_id;
	}
	public function update()
	{
		global $db, $tx;
		$db->query("update {$tx}expenses set expense_date='$this->expense_date',expense_category='$this->expense_category',description='$this->description',amount='$this->amount',currency='$this->currency',paid_by='$this->paid_by',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id)
	{
		global $db, $tx;
		$db->query("delete from {$tx}expenses where id={$id}");
	}
	public function jsonSerialize(): mixed
	{
		return get_object_vars($this);
	}
	public static function all()
	{
		global $db, $tx;
		$result = $db->query("select id,expense_date,expense_category,description,amount,currency,paid_by,created_at from {$tx}expenses");
		$data = [];
		while ($expense = $result->fetch_object()) {
			$data[] = $expense;
		}
		return $data;
	}
	public static function pagination($page = 1, $perpage = 10, $criteria = "")
	{
		global $db, $tx;
		$top = ($page - 1) * $perpage;
		$result = $db->query("select id,expense_date,expense_category,description,amount,currency,paid_by,created_at from {$tx}expenses $criteria limit $top,$perpage");
		$data = [];
		while ($expense = $result->fetch_object()) {
			$data[] = $expense;
		}
		return $data;
	}
	public static function count($criteria = "")
	{
		global $db, $tx;
		$result = $db->query("select count(*) from {$tx}expenses $criteria");
		list($count) = $result->fetch_row();
		return $count;
	}
	public static function find($id)
	{
		global $db, $tx;
		$result = $db->query("select id,expense_date,expense_category,description,amount,currency,paid_by,created_at from {$tx}expenses where id='$id'");
		$expense = $result->fetch_object();
		return $expense;
	}

	public static function latestByCategory($category)
	{
		global $db, $tx;
		$result = $db->query("SELECT * FROM {$tx}expenses WHERE expense_category='$category' ORDER BY expense_date DESC LIMIT 1");
		return $result->fetch_object();
	}



	static function get_last_id()
	{
		global $db, $tx;
		$result = $db->query("select max(id) last_id from {$tx}expenses");
		$expense = $result->fetch_object();
		return $expense->last_id;
	}
	public function json()
	{
		return json_encode($this);
	}
	public function __toString()
	{
		return "		Id:$this->id<br> 
		Expense Date:$this->expense_date<br> 
		Expense Category:$this->expense_category<br> 
		Description:$this->description<br> 
		Amount:$this->amount<br> 
		Currency:$this->currency<br> 
		Paid By:$this->paid_by<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name = "cmbExpense")
	{
		global $db, $tx;
		$html = "<select id='$name' name='$name'> ";
		$result = $db->query("select id,name from {$tx}expenses");
		while ($expense = $result->fetch_object()) {
			$html .= "<option value ='$expense->id'>$expense->name</option>";
		}
		$html .= "</select>";
		return $html;
	}
	static function html_table($page = 1, $perpage = 10, $criteria = "", $action = true)
	{
		global $db, $tx, $base_url;
		$count_result = $db->query("select count(*) total from {$tx}expenses $criteria ");
		list($total_rows) = $count_result->fetch_row();
		$total_pages = ceil($total_rows / $perpage);
		$top = ($page - 1) * $perpage;
		$result = $db->query("select id,expense_date,expense_category,description,amount,currency,paid_by,created_at from {$tx}expenses $criteria limit $top,$perpage");
		$html = "<table class='table'>";
		$html .= "<tr><th colspan='3'>" . Html::link(["class" => "btn btn-success", "route" => "expense/create", "text" => "New Expense"]) . "</th></tr>";
		if ($action) {
			$html .= "<tr><th>Id</th><th>Expense Date</th><th>Expense Category</th><th>Description</th><th>Amount</th><th>Currency</th><th>Paid By</th><th>Created At</th><th>Action</th></tr>";
		} else {
			$html .= "<tr><th>Id</th><th>Expense Date</th><th>Expense Category</th><th>Description</th><th>Amount</th><th>Currency</th><th>Paid By</th><th>Created At</th></tr>";
		}
		while ($expense = $result->fetch_object()) {
			$action_buttons = "";
			if ($action) {
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons .= Event::button(["name" => "show", "value" => "Show", "class" => "btn btn-info", "route" => "expense/show/$expense->id"]);
				$action_buttons .= Event::button(["name" => "edit", "value" => "Edit", "class" => "btn btn-primary", "route" => "expense/edit/$expense->id"]);
				$action_buttons .= Event::button(["name" => "delete", "value" => "Delete", "class" => "btn btn-danger", "route" => "expense/confirm/$expense->id"]);
				$action_buttons .= "</div></td>";
			}
			$html .= "<tr><td>$expense->id</td><td>$expense->expense_date</td><td>$expense->expense_category</td><td>$expense->description</td><td>$expense->amount</td><td>$expense->currency</td><td>$expense->paid_by</td><td>$expense->created_at</td> $action_buttons</tr>";
		}
		$html .= "</table>";
		$html .= pagination($page, $total_pages);
		return $html;
	}
	static function html_row_details($id)
	{
		global $db, $tx, $base_url;
		$result = $db->query("select id,expense_date,expense_category,description,amount,currency,paid_by,created_at from {$tx}expenses where id={$id}");
		$expense = $result->fetch_object();
		$html = "<table class='table'>";
		$html .= "<tr><th colspan=\"2\">Expense Show</th></tr>";
		$html .= "<tr><th>Id</th><td>$expense->id</td></tr>";
		$html .= "<tr><th>Expense Date</th><td>$expense->expense_date</td></tr>";
		$html .= "<tr><th>Expense Category</th><td>$expense->expense_category</td></tr>";
		$html .= "<tr><th>Description</th><td>$expense->description</td></tr>";
		$html .= "<tr><th>Amount</th><td>$expense->amount</td></tr>";
		$html .= "<tr><th>Currency</th><td>$expense->currency</td></tr>";
		$html .= "<tr><th>Paid By</th><td>$expense->paid_by</td></tr>";
		$html .= "<tr><th>Created At</th><td>$expense->created_at</td></tr>";

		$html .= "</table>";
		return $html;
	}
}
