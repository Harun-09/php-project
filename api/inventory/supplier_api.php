<?php
class SupplierApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["suppliers"=>Supplier::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["suppliers"=>Supplier::pagination($page,$perpage),"total_records"=>Supplier::count()]);
	}
	function find($data){
		 $supplier= Supplier::find($data['id']);
		echo json_encode(["supplier"=>$supplier, "data"=>$data]);
	}
	function delete($data){
		Supplier::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$supplier=new Supplier();
		$supplier->name=$data["name"];
		$supplier->contact_person=$data["contact_person"];
		$supplier->phone=$data["phone"];
		$supplier->email=$data["email"];
		$supplier->address=$data["address"];
		$supplier->status=$data["status"];

		$supplier->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$supplier=new Supplier();
		$supplier->id=$data["id"];
		$supplier->name=$data["name"];
		$supplier->contact_person=$data["contact_person"];
		$supplier->phone=$data["phone"];
		$supplier->email=$data["email"];
		$supplier->address=$data["address"];
		$supplier->status=$data["status"];
		$supplier->updated_at=$data["updated_at"];

		$supplier->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
