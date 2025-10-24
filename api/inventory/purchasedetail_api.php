<?php
class PurchaseDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["purchase_details"=>PurchaseDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["purchase_details"=>PurchaseDetail::pagination($page,$perpage),"total_records"=>PurchaseDetail::count()]);
	}
	function find($data){
		echo json_encode(["purchasedetail"=>PurchaseDetail::find($data["id"])]);
	}
	function delete($data){
		PurchaseDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$purchasedetail=new PurchaseDetail();
		$purchasedetail->purchase_id=$data["purchase_id"];
		$purchasedetail->product_id=$data["product_id"];
		$purchasedetail->warehouse_id=$data["warehouse_id"];
		$purchasedetail->qty=$data["qty"];

		$purchasedetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$purchasedetail=new PurchaseDetail();
		$purchasedetail->id=$data["id"];
		$purchasedetail->purchase_id=$data["purchase_id"];
		$purchasedetail->product_id=$data["product_id"];
		$purchasedetail->warehouse_id=$data["warehouse_id"];
		$purchasedetail->qty=$data["qty"];
		$purchasedetail->updated_at=date("Y-m-d H:i:s");

		$purchasedetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
