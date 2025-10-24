<?php
class BomApi
{
	public function __construct() {}
	function index()
	{
		echo json_encode(["boms" => Bom::all()]);
	}
	function pagination($data)
	{
		$page = $data["page"];
		$perpage = $data["perpage"];
		echo json_encode(["boms" => Bom::pagination($page, $perpage), "total_records" => Bom::count()]);
	}
	function find($data)
	{
		echo json_encode(["bom" => Bom::find($data["id"])]);
	}
	function delete($data)
	{
		Bom::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data, $file = [])
	{
		$bom = new Bom();
		$bom->bom_code = $data["bom_code"];
		$bom->product_id = $data["product_id"];
		$bom->product_name = $data["product_name"];
		$bom->revision_no = $data["revision_no"];
		$bom->effective_date = $data["effective_date"];
		$bom->status_id = $data["status_id"];
		$bom->created_at = date("Y-m-d H:i:s");
		$bom->updated_at = date("Y-m-d H:i:s");

		

		$bom_id = $bom->save();

		foreach ($data["components"] as  $data) {
			$bomdetail = new BomDetail();
			$bomdetail->bom_id = $bom_id;
			$bomdetail->raw_material_id = $data["id"];
			$bomdetail->quantity = $data["qty"];
			$bomdetail->uom = $data["uom_name"];
			$bomdetail->remarks = isset($data["remarks"]) ? $data["remarks"] : '';
			$bomdetail->created_at = date("Y-m-d H:i:s");
			$bomdetail->updated_at = date("Y-m-d H:i:s");
			$bomdetail->save();
		}

		echo json_encode(["success" => "yes"]);
	}
	function update($data, $file = [])
	{
		$bom = new Bom();
		$bom->id = $data["id"];
		$bom->bom_code = $data["bom_code"];
		$bom->product_id = $data["product_id"];
		$bom->product_name = $data["product_name"];
		$bom->revision_no = $data["revision_no"];
		$bom->effective_date = $data["effective_date"];
		$bom->updated_at = $data["updated_at"];

		$bom->update();
		echo json_encode(["success" => "yes"]);
	}
}
