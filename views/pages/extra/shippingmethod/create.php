<?php
echo Page::title(["title"=>"Create ShippingMethod"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"shippingmethod", "text"=>"Manage ShippingMethod"]);
echo Page::context_open();
echo Form::open(["route"=>"shippingmethod/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Description","type"=>"text","name"=>"description"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
