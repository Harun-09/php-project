<?php
echo Page::title(["title"=>"Show StockLog"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stocklog", "text"=>"Manage StockLog"]);
echo Page::context_open();
echo StockLog::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
