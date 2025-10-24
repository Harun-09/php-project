<?php
	echo Menu::item([
		"name"=>"Stocklog",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"stocklog/create","text"=>"Create Stocklog","icon"=>"far fa-circle nav-icon"],
			["route"=>"stocklog","text"=>"Manage Stocklog","icon"=>"far fa-circle nav-icon"],
		]
	]);
