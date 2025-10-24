<?php
echo Page::title(["title"=>"Edit QualityCheck"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"qualitycheck", "text"=>"Manage QualityCheck"]);
echo Page::context_open();
echo Form::open(["route"=>"qualitycheck/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$qualitycheck->id"]);
	echo Form::input(["label"=>"Production Order","name"=>"production_order_id","table"=>"production_orders","value"=>"$qualitycheck->production_order_id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$qualitycheck->product_id"]);
	echo Form::input(["label"=>"Checked By","type"=>"text","name"=>"checked_by","value"=>"$qualitycheck->checked_by"]);
	echo Form::input(["label"=>"Check Date","type"=>"text","name"=>"check_date","value"=>"$qualitycheck->check_date"]);
	echo Form::input(["label"=>"Status","type"=>"text","name"=>"status","value"=>"$qualitycheck->status"]);
	echo Form::input(["label"=>"Remarks","type"=>"text","name"=>"remarks","value"=>"$qualitycheck->remarks"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
