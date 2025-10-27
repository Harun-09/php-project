<?php
echo Page::title(["title"=>"Show ProductionDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productiondetail", "text"=>"Manage ProductionDetail"]);
echo Page::context_open();
echo ProductionDetail::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
