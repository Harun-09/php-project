<?php
	echo Menu::item([
		"name"=>"Bomdetail",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"bomdetail/create","text"=>"Create Bomdetail","icon"=>"far fa-circle nav-icon"],
			["route"=>"bomdetail","text"=>"Manage Bomdetail","icon"=>"far fa-circle nav-icon"],
		]
	]);
