<?php
echo Page::title(["title"=>"Edit OrderItem"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"orderitem", "text"=>"Manage OrderItem"]);
echo Page::context_open();
echo Form::open(["route"=>"orderitem/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$orderitem->id"]);
	echo Form::input(["label"=>"Order","name"=>"order_id","table"=>"orders","value"=>"$orderitem->order_id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$orderitem->product_id"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$orderitem->quantity"]);
	echo Form::input(["label"=>"Unit Price","type"=>"text","name"=>"unit_price","value"=>"$orderitem->unit_price"]);
	echo Form::input(["label"=>"Total Price","type"=>"text","name"=>"total_price","value"=>"$orderitem->total_price"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
