<?php
echo Page::title(["title"=>"Create Production"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"production", "text"=>"Manage Production"]);
echo Page::context_open();
echo Form::open(["route"=>"production/save"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Produced Qty","type"=>"text","name"=>"produced_qty"]);
	echo Form::input(["label"=>"Start Date","type"=>"text","name"=>"start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"text","name"=>"end_date"]);
	echo Form::input(["label"=>"Created By","type"=>"text","name"=>"created_by"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
