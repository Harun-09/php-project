<?php
	echo Menu::item([
		"name"=>"Productionwaste",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"productionwaste/create","text"=>"Create Productionwaste","icon"=>"far fa-circle nav-icon"],
			["route"=>"productionwaste","text"=>"Manage Productionwaste","icon"=>"far fa-circle nav-icon"],
		]
	]);
