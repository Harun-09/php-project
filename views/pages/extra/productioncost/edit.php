<?php
echo Page::title(["title"=>"Edit ProductionCost"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productioncost", "text"=>"Manage ProductionCost"]);
echo Page::context_open();
echo Form::open(["route"=>"productioncost/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$productioncost->id"]);
	echo Form::input(["label"=>"Production Order","name"=>"production_order_id","table"=>"production_orders","value"=>"$productioncost->production_order_id"]);
	echo Form::input(["label"=>"Raw Material Cost","type"=>"text","name"=>"raw_material_cost","value"=>"$productioncost->raw_material_cost"]);
	echo Form::input(["label"=>"Labor Cost","type"=>"text","name"=>"labor_cost","value"=>"$productioncost->labor_cost"]);
	echo Form::input(["label"=>"Overhead Cost","type"=>"text","name"=>"overhead_cost","value"=>"$productioncost->overhead_cost"]);
	echo Form::input(["label"=>"Total Cost","type"=>"text","name"=>"total_cost","value"=>"$productioncost->total_cost"]);
	echo Form::input(["label"=>"Currency","type"=>"text","name"=>"currency","value"=>"$productioncost->currency"]);
	echo Form::input(["label"=>"Recorded By","type"=>"text","name"=>"recorded_by","value"=>"$productioncost->recorded_by"]);
	echo Form::input(["label"=>"Recorded Date","type"=>"text","name"=>"recorded_date","value"=>"$productioncost->recorded_date"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
