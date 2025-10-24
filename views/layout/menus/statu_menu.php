<?php
	echo Menu::item([
		"name"=>"Statu",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"statu/create","text"=>"Create Statu","icon"=>"far fa-circle nav-icon"],
			["route"=>"statu","text"=>"Manage Statu","icon"=>"far fa-circle nav-icon"],
		]
	]);
