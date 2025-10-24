<?php
class UomApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["uom"=>Uom::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["uom"=>Uom::pagination($page,$perpage),"total_records"=>Uom::count()]);
	}
	function find($data){
		echo json_encode(["uom"=>Uom::find($data["id"])]);
	}
	function delete($data){
		Uom::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$uom=new Uom();
		$uom->name=$data["name"];
		$uom->code=$data["code"];
		$uom->description=$data["description"];
		$uom->status=$data["status"];

		$uom->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$uom=new Uom();
		$uom->id=$data["id"];
		$uom->name=$data["name"];
		$uom->code=$data["code"];
		$uom->description=$data["description"];
		$uom->status=$data["status"];

		$uom->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
