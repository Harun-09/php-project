<?php
echo Page::title(["title"=>"Show AuditLog"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"auditlog", "text"=>"Manage AuditLog"]);
echo Page::context_open();
echo Form::open(["route"=>"auditlog/delete/$id"]);
echo "Are you sure?";
echo AuditLog::html_row_details($id);
echo Form::input(["name"=>"id", "type"=>"hidden", "value"=>$id]);
echo Form::input(["name"=>"delete", "class"=>"btn btn-danger", "value"=>"Delete", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
