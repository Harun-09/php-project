<?php
echo Page::title(["title"=>"Show ProductionWaste"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productionwaste", "text"=>"Manage ProductionWaste"]);
echo Page::context_open();
echo ProductionWaste::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
