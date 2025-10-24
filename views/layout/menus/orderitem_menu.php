<?php
	echo Menu::item([
		"name"=>"Orderitem",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"orderitem/create","text"=>"Create Orderitem","icon"=>"far fa-circle nav-icon"],
			["route"=>"orderitem","text"=>"Manage Orderitem","icon"=>"far fa-circle nav-icon"],
		]
	]);
