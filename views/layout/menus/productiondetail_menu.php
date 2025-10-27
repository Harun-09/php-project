<?php
	echo Menu::item([
		"name"=>"Productiondetail",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"productiondetail/create","text"=>"Create Productiondetail","icon"=>"far fa-circle nav-icon"],
			["route"=>"productiondetail","text"=>"Manage Productiondetail","icon"=>"far fa-circle nav-icon"],
		]
	]);
