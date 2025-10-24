<?php
echo Page::title(["title"=>"Edit Employee"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"employee", "text"=>"Manage Employee"]);
echo Page::context_open();
echo Form::open(["route"=>"employee/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$employee->id"]);
	echo Form::input(["label"=>"First Name","type"=>"text","name"=>"first_name","value"=>"$employee->first_name"]);
	echo Form::input(["label"=>"Last Name","type"=>"text","name"=>"last_name","value"=>"$employee->last_name"]);
	echo Form::input(["label"=>"Employee Code","type"=>"text","name"=>"employee_code","value"=>"$employee->employee_code"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email","value"=>"$employee->email"]);
	echo Form::input(["label"=>"Phone","type"=>"text","name"=>"phone","value"=>"$employee->phone"]);
	echo Form::input(["label"=>"Department","type"=>"text","name"=>"department","value"=>"$employee->department"]);
	echo Form::input(["label"=>"Designation","type"=>"text","name"=>"designation","value"=>"$employee->designation"]);
	echo Form::input(["label"=>"Status","type"=>"textarea","name"=>"status","value"=>"$employee->status"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
