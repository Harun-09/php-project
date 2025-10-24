<?php
class ProductApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["products"=>Product::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["products"=>Product::pagination($page,$perpage),"total_records"=>Product::count()]);
	}
	function find($data){
		echo json_encode(["product"=>Product::find($data["id"])]);
	}
	function delete($data){
		Product::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$product=new Product();
		$product->name=$data["name"];
		$product->category_id=$data["category_id"];
		$product->uom_id=$data["uom_id"];
		$product->description=$data["description"];
		$product->brand=$data["brand"];
		$product->sku=$data["sku"];
		$product->image=$data["image"];
		$product->stock_qty=$data["stock_qty"];

		$product->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$product=new Product();
		$product->id=$data["id"];
		$product->name=$data["name"];
		$product->category_id=$data["category_id"];
		$product->uom_id=$data["uom_id"];
		$product->description=$data["description"];
		$product->brand=$data["brand"];
		$product->sku=$data["sku"];
		$product->image=$data["image"];
		$product->stock_qty=$data["stock_qty"];
		$product->updated_at=$data["updated_at"];

		$product->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
