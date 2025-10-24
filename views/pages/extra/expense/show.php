<?php
echo Page::title(["title"=>"Show Expense"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"expense", "text"=>"Manage Expense"]);
echo Page::context_open();
echo Expense::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
