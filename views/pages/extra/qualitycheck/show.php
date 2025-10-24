<?php
echo Page::title(["title"=>"Show QualityCheck"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"qualitycheck", "text"=>"Manage QualityCheck"]);
echo Page::context_open();
echo QualityCheck::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
