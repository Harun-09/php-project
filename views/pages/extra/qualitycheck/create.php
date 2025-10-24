<?php
echo Page::title(["title"=>"Create QualityCheck"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"qualitycheck", "text"=>"Manage QualityCheck"]);
echo Page::context_open();
echo Form::open(["route"=>"qualitycheck/save"]);
	echo Form::input(["label"=>"Production Order","name"=>"production_order_id","table"=>"production_orders"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Checked By","type"=>"text","name"=>"checked_by"]);
	echo Form::input(["label"=>"Check Date","type"=>"text","name"=>"check_date"]);
	echo Form::input(["label"=>"Status","type"=>"text","name"=>"status"]);
	echo Form::input(["label"=>"Remarks","type"=>"text","name"=>"remarks"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
