<?php
echo Page::title(["title"=>"Edit ProductionDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productiondetail", "text"=>"Manage ProductionDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"productiondetail/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$productiondetail->id"]);
	echo Form::input(["label"=>"Production","name"=>"production_id","table"=>"productions","value"=>"$productiondetail->production_id"]);
	echo Form::input(["label"=>"Produced Qty","type"=>"text","name"=>"produced_qty","value"=>"$productiondetail->produced_qty"]);
	echo Form::input(["label"=>"Operator Name","type"=>"text","name"=>"operator_name","value"=>"$productiondetail->operator_name"]);
	echo Form::input(["label"=>"Remarks","type"=>"textarea","name"=>"remarks","value"=>"$productiondetail->remarks"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
