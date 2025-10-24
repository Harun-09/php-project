<?php
echo Page::title(["title"=>"Edit AuditLog"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"auditlog", "text"=>"Manage AuditLog"]);
echo Page::context_open();
echo Form::open(["route"=>"auditlog/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$auditlog->id"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users","value"=>"$auditlog->user_id"]);
	echo Form::input(["label"=>"Action Type","type"=>"text","name"=>"action_type","value"=>"$auditlog->action_type"]);
	echo Form::input(["label"=>"Module Name","type"=>"text","name"=>"module_name","value"=>"$auditlog->module_name"]);
	echo Form::input(["label"=>"Record","name"=>"record_id","table"=>"records","value"=>"$auditlog->record_id"]);
	echo Form::input(["label"=>"Description","type"=>"text","name"=>"description","value"=>"$auditlog->description"]);
	echo Form::input(["label"=>"Ip Address","type"=>"text","name"=>"ip_address","value"=>"$auditlog->ip_address"]);
	echo Form::input(["label"=>"User Agent","type"=>"text","name"=>"user_agent","value"=>"$auditlog->user_agent"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
