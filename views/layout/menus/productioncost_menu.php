<?php
	echo Menu::item([
		"name"=>"Productioncost",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"productioncost/create","text"=>"Create Productioncost","icon"=>"far fa-circle nav-icon"],
			["route"=>"productioncost","text"=>"Manage Productioncost","icon"=>"far fa-circle nav-icon"],
		]
	]);
