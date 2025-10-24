<?php
echo Page::title(["title"=>"Edit ShiftSchedule"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"shiftschedule", "text"=>"Manage ShiftSchedule"]);
echo Page::context_open();
echo Form::open(["route"=>"shiftschedule/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$shiftschedule->id"]);
	echo Form::input(["label"=>"Shift Name","type"=>"text","name"=>"shift_name","value"=>"$shiftschedule->shift_name"]);
	echo Form::input(["label"=>"Start Time","type"=>"text","name"=>"start_time","value"=>"$shiftschedule->start_time"]);
	echo Form::input(["label"=>"End Time","type"=>"text","name"=>"end_time","value"=>"$shiftschedule->end_time"]);
	echo Form::input(["label"=>"Department","name"=>"department_id","table"=>"departments","value"=>"$shiftschedule->department_id"]);
	echo Form::input(["label"=>"Assigned Employee","name"=>"assigned_employee_id","table"=>"assigned_employees","value"=>"$shiftschedule->assigned_employee_id"]);
	echo Form::input(["label"=>"Working Days","type"=>"text","name"=>"working_days","value"=>"$shiftschedule->working_days"]);
	echo Form::input(["label"=>"Status","type"=>"textarea","name"=>"status","value"=>"$shiftschedule->status"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
