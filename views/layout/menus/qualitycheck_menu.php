<?php
	echo Menu::item([
		"name"=>"Qualitycheck",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"qualitycheck/create","text"=>"Create Qualitycheck","icon"=>"far fa-circle nav-icon"],
			["route"=>"qualitycheck","text"=>"Manage Qualitycheck","icon"=>"far fa-circle nav-icon"],
		]
	]);
