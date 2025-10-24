<?php
echo Page::title(["title"=>"Edit PurchaseItem"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"purchaseitem", "text"=>"Manage PurchaseItem"]);
echo Page::context_open();
echo Form::open(["route"=>"purchaseitem/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$purchaseitem->id"]);
	echo Form::input(["label"=>"Purchase Order","name"=>"purchase_order_id","table"=>"purchase_orders","value"=>"$purchaseitem->purchase_order_id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$purchaseitem->product_id"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$purchaseitem->quantity"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom","value"=>"$purchaseitem->uom_id"]);
	echo Form::input(["label"=>"Unit Price","type"=>"text","name"=>"unit_price","value"=>"$purchaseitem->unit_price"]);
	echo Form::input(["label"=>"Total Price","type"=>"text","name"=>"total_price","value"=>"$purchaseitem->total_price"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
