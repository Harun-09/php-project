<?php
echo Page::title(["title"=>"Create ProductionWaste"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productionwaste", "text"=>"Manage ProductionWaste"]);
echo Page::context_open();
echo Form::open(["route"=>"productionwaste/save"]);
	echo Form::input(["label"=>"Production Order","name"=>"production_order_id","table"=>"production_orders"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Material","name"=>"material_id","table"=>"materials"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom"]);
	echo Form::input(["label"=>"Reason","type"=>"text","name"=>"reason"]);
	echo Form::input(["label"=>"Recorded By","type"=>"text","name"=>"recorded_by"]);
	echo Form::input(["label"=>"Recorded Date","type"=>"text","name"=>"recorded_date"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
