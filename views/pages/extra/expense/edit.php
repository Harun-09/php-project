<?php
echo Page::title(["title"=>"Edit Expense"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"expense", "text"=>"Manage Expense"]);
echo Page::context_open();
echo Form::open(["route"=>"expense/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$expense->id"]);
	echo Form::input(["label"=>"Expense Date","type"=>"text","name"=>"expense_date","value"=>"$expense->expense_date"]);
	echo Form::input(["label"=>"Expense Category","type"=>"text","name"=>"expense_category","value"=>"$expense->expense_category"]);
	echo Form::input(["label"=>"Description","type"=>"text","name"=>"description","value"=>"$expense->description"]);
	echo Form::input(["label"=>"Amount","type"=>"text","name"=>"amount","value"=>"$expense->amount"]);
	echo Form::input(["label"=>"Currency","type"=>"text","name"=>"currency","value"=>"$expense->currency"]);
	echo Form::input(["label"=>"Paid By","type"=>"text","name"=>"paid_by","value"=>"$expense->paid_by"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
