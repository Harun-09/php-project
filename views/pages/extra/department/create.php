<?php
echo Page::title(["title"=>"Create Department"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"department", "text"=>"Manage Department"]);
echo Page::context_open();
echo Form::open(["route"=>"department/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Code","type"=>"text","name"=>"code"]);
	echo Form::input(["label"=>"Description","type"=>"text","name"=>"description"]);
	echo Form::input(["label"=>"Status","type"=>"textarea","name"=>"status"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
