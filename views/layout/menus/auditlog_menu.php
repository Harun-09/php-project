<?php
	echo Menu::item([
		"name"=>"Auditlog",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"auditlog/create","text"=>"Create Auditlog","icon"=>"far fa-circle nav-icon"],
			["route"=>"auditlog","text"=>"Manage Auditlog","icon"=>"far fa-circle nav-icon"],
		]
	]);
