<?php
echo Page::title(["title"=>"Create AuditLog"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"auditlog", "text"=>"Manage AuditLog"]);
echo Page::context_open();
echo Form::open(["route"=>"auditlog/save"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users"]);
	echo Form::input(["label"=>"Action Type","type"=>"text","name"=>"action_type"]);
	echo Form::input(["label"=>"Module Name","type"=>"text","name"=>"module_name"]);
	echo Form::input(["label"=>"Record","name"=>"record_id","table"=>"records"]);
	echo Form::input(["label"=>"Description","type"=>"text","name"=>"description"]);
	echo Form::input(["label"=>"Ip Address","type"=>"text","name"=>"ip_address"]);
	echo Form::input(["label"=>"User Agent","type"=>"text","name"=>"user_agent"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
