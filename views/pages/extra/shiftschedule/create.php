<?php
echo Page::title(["title"=>"Create ShiftSchedule"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"shiftschedule", "text"=>"Manage ShiftSchedule"]);
echo Page::context_open();
echo Form::open(["route"=>"shiftschedule/save"]);
	echo Form::input(["label"=>"Shift Name","type"=>"text","name"=>"shift_name"]);
	echo Form::input(["label"=>"Start Time","type"=>"text","name"=>"start_time"]);
	echo Form::input(["label"=>"End Time","type"=>"text","name"=>"end_time"]);
	echo Form::input(["label"=>"Department","name"=>"department_id","table"=>"departments"]);
	echo Form::input(["label"=>"Assigned Employee","name"=>"assigned_employee_id","table"=>"assigned_employees"]);
	echo Form::input(["label"=>"Working Days","type"=>"text","name"=>"working_days"]);
	echo Form::input(["label"=>"Status","type"=>"textarea","name"=>"status"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
