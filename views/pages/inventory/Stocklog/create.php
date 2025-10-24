<?php
echo Page::title(["title"=>"Create StockLog"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stocklog", "text"=>"Manage StockLog"]);
echo Page::context_open();
echo Form::open(["route"=>"stocklog/save"]);
	echo Form::input(["label"=>"Stock","name"=>"stock_id","table"=>"stocks"]);
	echo Form::input(["label"=>"Transaction Type","type"=>"text","name"=>"transaction_type"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Reference","name"=>"reference_id","table"=>"references"]);
	echo Form::input(["label"=>"Note","type"=>"text","name"=>"note"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
