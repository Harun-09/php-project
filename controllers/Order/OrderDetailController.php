<?php
class OrderDetailController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("extra");
	}
	public function create(){
		view("extra");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];

		if(count($errors)==0){
			$orderdetail=new OrderDetail();
			$orderdetail->order_id=$data["order_id"];
			$orderdetail->product_id=$data["product_id"];
			$orderdetail->qty=$data["qty"];
			$orderdetail->price=$data["price"];
			$orderdetail->vat=$data["vat"];
			$orderdetail->discount=$data["discount"];
			$orderdetail->warehouse_id=$data["warehouse_id"]; // যোগ করা হলো
			$orderdetail->created_at=$data["created_at"];
			$orderdetail->updated_at=$data["updated_at"];

			$orderdetail->save();
			redirect();
		}else{
			print_r($errors);
		}
	}
}
public function edit($id){
	view("extra",OrderDetail::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];

		if(count($errors)==0){
			$orderdetail=new OrderDetail();
			$orderdetail->id=$data["id"];
			$orderdetail->order_id=$data["order_id"];
			$orderdetail->product_id=$data["product_id"];
			$orderdetail->qty=$data["qty"];
			$orderdetail->price=$data["price"];
			$orderdetail->vat=$data["vat"];
			$orderdetail->discount=$data["discount"];
			$orderdetail->warehouse_id=$data["warehouse_id"]; // যোগ করা হলো
			$orderdetail->created_at=$data["created_at"];
			$orderdetail->updated_at=$data["updated_at"];

			$orderdetail->update();
			redirect();
		}else{
			print_r($errors);
		}
	}
}
	public function confirm($id){
		view("extra");
	}
	public function delete($id){
		OrderDetail::delete($id);
		redirect();
	}
	public function show($id){
		view("extra",OrderDetail::find($id));
	}
}
?>
