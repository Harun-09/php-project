<?php
	echo Menu::item([
		"name"=>"Production",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"production/create","text"=>"Create Production","icon"=>"far fa-circle nav-icon"],
			["route"=>"production","text"=>"Manage Production","icon"=>"far fa-circle nav-icon"],
		]
	]);
