<?php
echo Page::title(["title"=>"Create Employee"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"employee", "text"=>"Manage Employee"]);
echo Page::context_open();
echo Form::open(["route"=>"employee/save"]);
	echo Form::input(["label"=>"First Name","type"=>"text","name"=>"first_name"]);
	echo Form::input(["label"=>"Last Name","type"=>"text","name"=>"last_name"]);
	echo Form::input(["label"=>"Employee Code","type"=>"text","name"=>"employee_code"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email"]);
	echo Form::input(["label"=>"Phone","type"=>"text","name"=>"phone"]);
	echo Form::input(["label"=>"Department","type"=>"text","name"=>"department"]);
	echo Form::input(["label"=>"Designation","type"=>"text","name"=>"designation"]);
	echo Form::input(["label"=>"Status","type"=>"textarea","name"=>"status"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
