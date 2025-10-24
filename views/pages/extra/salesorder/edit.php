<?php
echo Page::title(["title"=>"Edit SalesOrder"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"salesorder", "text"=>"Manage SalesOrder"]);
echo Page::context_open();
echo Form::open(["route"=>"salesorder/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$salesorder->id"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$salesorder->customer_id"]);
	echo Form::input(["label"=>"Order Number","type"=>"text","name"=>"order_number","value"=>"$salesorder->order_number"]);
	echo Form::input(["label"=>"Order Date","type"=>"text","name"=>"order_date","value"=>"$salesorder->order_date"]);
	echo Form::input(["label"=>"Delivery Date","type"=>"text","name"=>"delivery_date","value"=>"$salesorder->delivery_date"]);
	echo Form::input(["label"=>"Status","type"=>"text","name"=>"status","value"=>"$salesorder->status"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount","value"=>"$salesorder->total_amount"]);
	echo Form::input(["label"=>"Currency","type"=>"text","name"=>"currency","value"=>"$salesorder->currency"]);
	echo Form::input(["label"=>"Created By","type"=>"text","name"=>"created_by","value"=>"$salesorder->created_by"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
