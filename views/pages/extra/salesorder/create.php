<?php
echo Page::title(["title"=>"Create SalesOrder"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"salesorder", "text"=>"Manage SalesOrder"]);
echo Page::context_open();
echo Form::open(["route"=>"salesorder/save"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Order Number","type"=>"text","name"=>"order_number"]);
	echo Form::input(["label"=>"Order Date","type"=>"text","name"=>"order_date"]);
	echo Form::input(["label"=>"Delivery Date","type"=>"text","name"=>"delivery_date"]);
	echo Form::input(["label"=>"Status","type"=>"text","name"=>"status"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount"]);
	echo Form::input(["label"=>"Currency","type"=>"text","name"=>"currency"]);
	echo Form::input(["label"=>"Created By","type"=>"text","name"=>"created_by"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
