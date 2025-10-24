<?php
class StatusApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["status"=>status::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["status"=>Status::pagination($page,$perpage),"total_records"=>Status::count()]);
	}
	function find($data){
		echo json_encode(["statu"=>Status::find($data["id"])]);
	}
	function delete($data){
		Status::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$statu=new Status();
		$statu->name=$data["name"];

		$statu->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$statu=new Status();
		$statu->id=$data["id"];
		$statu->name=$data["name"];

		$statu->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
