<?php
	echo Menu::item([
		"name"=>"Bom",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"bom/create","text"=>"Create Bom","icon"=>"far fa-circle nav-icon"],
			["route"=>"bom","text"=>"Manage Bom","icon"=>"far fa-circle nav-icon"],
		]
	]);
