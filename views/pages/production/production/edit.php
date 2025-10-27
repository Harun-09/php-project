<?php
echo Page::title(["title"=>"Edit Production"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"production", "text"=>"Manage Production"]);
echo Page::context_open();
echo Form::open(["route"=>"production/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$production->id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$production->product_id"]);
	echo Form::input(["label"=>"Produced Qty","type"=>"text","name"=>"produced_qty","value"=>"$production->produced_qty"]);
	echo Form::input(["label"=>"Start Date","type"=>"text","name"=>"start_date","value"=>"$production->start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"text","name"=>"end_date","value"=>"$production->end_date"]);
	echo Form::input(["label"=>"Created By","type"=>"text","name"=>"created_by","value"=>"$production->created_by"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
