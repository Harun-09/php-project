<?php
class BomDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["bom_details"=>BomDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["bom_details"=>BomDetail::pagination($page,$perpage),"total_records"=>BomDetail::count()]);
	}
	function find($data){
		echo json_encode(["bomdetail"=>BomDetail::find($data["id"])]);
	}
	function delete($data){
		BomDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$bomdetail=new BomDetail();
		$bomdetail->bom_id=$data["bom_id"];
		$bomdetail->raw_material_id=$data["raw_material_id"];
		$bomdetail->uom=$data["uom"];
		$bomdetail->remarks=$data["remarks"];

		$bomdetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$bomdetail=new BomDetail();
		$bomdetail->id=$data["id"];
		$bomdetail->bom_id=$data["bom_id"];
		$bomdetail->raw_material_id=$data["raw_material_id"];
		$bomdetail->uom=$data["uom"];
		$bomdetail->remarks=$data["remarks"];
		$bomdetail->updated_at=$data["updated_at"];

		$bomdetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
