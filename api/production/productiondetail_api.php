<?php
class ProductionDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["production_details"=>ProductionDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["production_details"=>ProductionDetail::pagination($page,$perpage),"total_records"=>ProductionDetail::count()]);
	}
	function find($data){
		echo json_encode(["productiondetail"=>ProductionDetail::find($data["id"])]);
	}
	function delete($data){
		ProductionDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$productiondetail=new ProductionDetail();
		$productiondetail->production_id=$data["production_id"];
		$productiondetail->operator_name=$data["operator_name"];
		$productiondetail->remarks=$data["remarks"];

		$productiondetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$productiondetail=new ProductionDetail();
		$productiondetail->id=$data["id"];
		$productiondetail->production_id=$data["production_id"];
		$productiondetail->operator_name=$data["operator_name"];
		$productiondetail->remarks=$data["remarks"];
		$productiondetail->updated_at=$data["updated_at"];

		$productiondetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
