<?php
echo Page::title(["title"=>"Edit StockLog"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stocklog", "text"=>"Manage StockLog"]);
echo Page::context_open();
echo Form::open(["route"=>"stocklog/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$stocklog->id"]);
	echo Form::input(["label"=>"Stock","name"=>"stock_id","table"=>"stocks","value"=>"$stocklog->stock_id"]);
	echo Form::input(["label"=>"Transaction Type","type"=>"text","name"=>"transaction_type","value"=>"$stocklog->transaction_type"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$stocklog->quantity"]);
	echo Form::input(["label"=>"Reference","name"=>"reference_id","table"=>"references","value"=>"$stocklog->reference_id"]);
	echo Form::input(["label"=>"Note","type"=>"text","name"=>"note","value"=>"$stocklog->note"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
