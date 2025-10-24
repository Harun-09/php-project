<?php
	echo Menu::item([
		"name"=>"Purcgase",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"purcgase/create","text"=>"Create Purcgase","icon"=>"far fa-circle nav-icon"],
			["route"=>"purcgase","text"=>"Manage Purcgase","icon"=>"far fa-circle nav-icon"],
		]
	]);
