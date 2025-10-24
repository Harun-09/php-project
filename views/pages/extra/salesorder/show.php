<?php
echo Page::title(["title"=>"Show SalesOrder"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"salesorder", "text"=>"Manage SalesOrder"]);
echo Page::context_open();
echo SalesOrder::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
