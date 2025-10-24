<?php
	echo Menu::item([
		"name"=>"Shiftschedule",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"shiftschedule/create","text"=>"Create Shiftschedule","icon"=>"far fa-circle nav-icon"],
			["route"=>"shiftschedule","text"=>"Manage Shiftschedule","icon"=>"far fa-circle nav-icon"],
		]
	]);
