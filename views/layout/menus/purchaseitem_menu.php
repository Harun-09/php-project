<?php
	echo Menu::item([
		"name"=>"Purchaseitem",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"purchaseitem/create","text"=>"Create Purchaseitem","icon"=>"far fa-circle nav-icon"],
			["route"=>"purchaseitem","text"=>"Manage Purchaseitem","icon"=>"far fa-circle nav-icon"],
		]
	]);
