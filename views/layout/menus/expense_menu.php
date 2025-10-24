<?php
	echo Menu::item([
		"name"=>"Expense",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"expense/create","text"=>"Create Expense","icon"=>"far fa-circle nav-icon"],
			["route"=>"expense","text"=>"Manage Expense","icon"=>"far fa-circle nav-icon"],
		]
	]);
