<?php
// echo Page::title(["title"=>"Show Production"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"production", "text"=>"Manage Production"]);
echo Page::context_open();
echo Production::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
