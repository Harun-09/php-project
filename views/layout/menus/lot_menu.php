<?php
	echo Menu::item([
		"name"=>"Lot",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"lot/create","text"=>"Create Lot","icon"=>"far fa-circle nav-icon"],
			["route"=>"lot","text"=>"Manage Lot","icon"=>"far fa-circle nav-icon"],
		]
	]);
