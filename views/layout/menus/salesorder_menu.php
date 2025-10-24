<?php
	echo Menu::item([
		"name"=>"Salesorder",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"salesorder/create","text"=>"Create Salesorder","icon"=>"far fa-circle nav-icon"],
			["route"=>"salesorder","text"=>"Manage Salesorder","icon"=>"far fa-circle nav-icon"],
		]
	]);
