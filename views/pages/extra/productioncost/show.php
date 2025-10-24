<?php
echo Page::title(["title"=>"Show ProductionCost"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productioncost", "text"=>"Manage ProductionCost"]);
echo Page::context_open();
echo ProductionCost::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
