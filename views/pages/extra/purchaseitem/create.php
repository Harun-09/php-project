<?php
echo Page::title(["title"=>"Create PurchaseItem"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"purchaseitem", "text"=>"Manage PurchaseItem"]);
echo Page::context_open();
echo Form::open(["route"=>"purchaseitem/save"]);
	echo Form::input(["label"=>"Purchase Order","name"=>"purchase_order_id","table"=>"purchase_orders"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom"]);
	echo Form::input(["label"=>"Unit Price","type"=>"text","name"=>"unit_price"]);
	echo Form::input(["label"=>"Total Price","type"=>"text","name"=>"total_price"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
