<?php
echo Page::title(["title"=>"Manage SalesItem"]);
echo Page::body_open();
echo Page::context_open();
$page = isset($_GET["page"]) ?$_GET["page"]:1;
echo SalesItem::html_table($page,10);
echo Page::context_close();
echo Page::body_close();
