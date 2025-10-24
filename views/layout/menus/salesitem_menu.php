<?php
	echo Menu::item([
		"name"=>"Salesitem",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"salesitem/create","text"=>"Create Salesitem","icon"=>"far fa-circle nav-icon"],
			["route"=>"salesitem","text"=>"Manage Salesitem","icon"=>"far fa-circle nav-icon"],
		]
	]);
