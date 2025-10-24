<?php
echo Page::title(["title"=>"Edit User"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"user", "text"=>"Manage User"]);
echo Page::context_open();
echo Form::open(["route"=>"user/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$user->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$user->name"]);
	echo Form::input(["label"=>"Full Name","type"=>"text","name"=>"full_name","value"=>"$user->full_name"]);
	echo Form::input(["label"=>"Password","type"=>"text","name"=>"password","value"=>"$user->password"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email","value"=>"$user->email"]);
	echo Form::input(["label"=>"Mobile","type"=>"text","name"=>"mobile","value"=>"$user->mobile"]);
	echo Form::input(["label"=>"Photo","type"=>"file","name"=>"photo","value"=>$user->photo]);
	echo Form::input(["label"=>"Role","name"=>"role_id","table"=>"roles","value"=>"$user->role_id"]);
	echo Form::input(["label"=>"Inactive","type"=>"checkbox","name"=>"inactive","value"=>"$user->inactive","checked"=>$user->inactive?"checked":""]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
