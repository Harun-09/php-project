<?php
echo Page::title(["title"=>"Edit ProductionWaste"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productionwaste", "text"=>"Manage ProductionWaste"]);
echo Page::context_open();
echo Form::open(["route"=>"productionwaste/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$productionwaste->id"]);
	echo Form::input(["label"=>"Production Order","name"=>"production_order_id","table"=>"production_orders","value"=>"$productionwaste->production_order_id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$productionwaste->product_id"]);
	echo Form::input(["label"=>"Material","name"=>"material_id","table"=>"materials","value"=>"$productionwaste->material_id"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$productionwaste->quantity"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom","value"=>"$productionwaste->uom_id"]);
	echo Form::input(["label"=>"Reason","type"=>"text","name"=>"reason","value"=>"$productionwaste->reason"]);
	echo Form::input(["label"=>"Recorded By","type"=>"text","name"=>"recorded_by","value"=>"$productionwaste->recorded_by"]);
	echo Form::input(["label"=>"Recorded Date","type"=>"text","name"=>"recorded_date","value"=>"$productionwaste->recorded_date"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
