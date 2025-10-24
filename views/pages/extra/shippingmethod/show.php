<?php
echo Page::title(["title"=>"Show ShippingMethod"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"shippingmethod", "text"=>"Manage ShippingMethod"]);
echo Page::context_open();
echo ShippingMethod::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
