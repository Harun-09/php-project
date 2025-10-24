<?php
echo Page::title(["title"=>"Create Expense"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"expense", "text"=>"Manage Expense"]);
echo Page::context_open();
echo Form::open(["route"=>"expense/save"]);
	echo Form::input(["label"=>"Expense Date","type"=>"text","name"=>"expense_date"]);
	echo Form::input(["label"=>"Expense Category","type"=>"text","name"=>"expense_category"]);
	echo Form::input(["label"=>"Description","type"=>"text","name"=>"description"]);
	echo Form::input(["label"=>"Amount","type"=>"text","name"=>"amount"]);
	echo Form::input(["label"=>"Currency","type"=>"text","name"=>"currency"]);
	echo Form::input(["label"=>"Paid By","type"=>"text","name"=>"paid_by"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
