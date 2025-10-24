<?php
echo Page::title(["title"=>"Edit SalesItem"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"salesitem", "text"=>"Manage SalesItem"]);
echo Page::context_open();
echo Form::open(["route"=>"salesitem/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$salesitem->id"]);
	echo Form::input(["label"=>"Sales Order","name"=>"sales_order_id","table"=>"sales_orders","value"=>"$salesitem->sales_order_id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$salesitem->product_id"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$salesitem->quantity"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom","value"=>"$salesitem->uom_id"]);
	echo Form::input(["label"=>"Unit Price","type"=>"text","name"=>"unit_price","value"=>"$salesitem->unit_price"]);
	echo Form::input(["label"=>"Total Price","type"=>"text","name"=>"total_price","value"=>"$salesitem->total_price"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
