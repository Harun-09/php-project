<?php
	echo Menu::item([
		"name"=>"Transactiontype",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"transactiontype/create","text"=>"Create Transactiontype","icon"=>"far fa-circle nav-icon"],
			["route"=>"transactiontype","text"=>"Manage Transactiontype","icon"=>"far fa-circle nav-icon"],
		]
	]);
