<?php
echo Page::title(["title"=>"Show PurchaseItem"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"purchaseitem", "text"=>"Manage PurchaseItem"]);
echo Page::context_open();
echo PurchaseItem::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
