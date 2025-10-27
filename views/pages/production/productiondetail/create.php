<?php
echo Page::title(["title"=>"Create ProductionDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productiondetail", "text"=>"Manage ProductionDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"productiondetail/save"]);
	echo Form::input(["label"=>"Production","name"=>"production_id","table"=>"productions"]);
	echo Form::input(["label"=>"Produced Qty","type"=>"text","name"=>"produced_qty"]);
	echo Form::input(["label"=>"Operator Name","type"=>"text","name"=>"operator_name"]);
	echo Form::input(["label"=>"Remarks","type"=>"textarea","name"=>"remarks"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
