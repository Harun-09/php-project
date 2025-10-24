<?php
echo Page::title(["title"=>"Show SalesItem"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"salesitem", "text"=>"Manage SalesItem"]);
echo Page::context_open();
echo SalesItem::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
