<?php
echo Page::title(["title"=>"Create Product"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"product", "text"=>"Manage Product"]);
echo Page::context_open();
echo Form::open(["route"=>"product/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Category","name"=>"category_id","table"=>"categories"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description"]);
	echo Form::input(["label"=>"Brand","type"=>"text","name"=>"brand"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);
	echo Form::input(["label"=>"Sku","type"=>"text","name"=>"sku"]);
	echo Form::input(["label"=>"Tax","type"=>"text","name"=>"tax"]);
	echo Form::input(["label"=>"Image","type"=>"text","name"=>"image"]);
	echo Form::input(["label"=>"Stock Qty","type"=>"text","name"=>"stock_qty"]);
	echo Form::input(["label"=>"Purchase Price","type"=>"text","name"=>"purchase_price"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
