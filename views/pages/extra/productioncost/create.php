<?php
echo Page::title(["title"=>"Create ProductionCost"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productioncost", "text"=>"Manage ProductionCost"]);
echo Page::context_open();
echo Form::open(["route"=>"productioncost/save"]);
	echo Form::input(["label"=>"Production Order","name"=>"production_order_id","table"=>"production_orders"]);
	echo Form::input(["label"=>"Raw Material Cost","type"=>"text","name"=>"raw_material_cost"]);
	echo Form::input(["label"=>"Labor Cost","type"=>"text","name"=>"labor_cost"]);
	echo Form::input(["label"=>"Overhead Cost","type"=>"text","name"=>"overhead_cost"]);
	echo Form::input(["label"=>"Total Cost","type"=>"text","name"=>"total_cost"]);
	echo Form::input(["label"=>"Currency","type"=>"text","name"=>"currency"]);
	echo Form::input(["label"=>"Recorded By","type"=>"text","name"=>"recorded_by"]);
	echo Form::input(["label"=>"Recorded Date","type"=>"text","name"=>"recorded_date"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
