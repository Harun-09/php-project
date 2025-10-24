<?php
	echo Menu::item([
		"name"=>"Warehouse",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"warehouse/create","text"=>"Create Warehouse","icon"=>"far fa-circle nav-icon"],
			["route"=>"warehouse","text"=>"Manage Warehouse","icon"=>"far fa-circle nav-icon"],
		]
	]);
