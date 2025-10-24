<?php
echo Page::title(["title"=>"Create PurchaseDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"purchasedetail", "text"=>"Manage PurchaseDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"purchasedetail/save"]);
	echo Form::input(["label"=>"Purchase","name"=>"purchase_id","table"=>"purchases"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Warehouse","name"=>"warehouse_id","table"=>"warehouses"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);
	echo Form::input(["label"=>"Total","type"=>"text","name"=>"total"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
