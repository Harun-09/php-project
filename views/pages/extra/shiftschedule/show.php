<?php
echo Page::title(["title"=>"Show ShiftSchedule"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"shiftschedule", "text"=>"Manage ShiftSchedule"]);
echo Page::context_open();
echo ShiftSchedule::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
