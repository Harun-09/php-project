<?php
echo Page::title(["title"=>"Edit ShippingMethod"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"shippingmethod", "text"=>"Manage ShippingMethod"]);
echo Page::context_open();
echo Form::open(["route"=>"shippingmethod/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$shippingmethod->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$shippingmethod->name"]);
	echo Form::input(["label"=>"Description","type"=>"text","name"=>"description","value"=>"$shippingmethod->description"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
