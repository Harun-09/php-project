<?php
	echo Menu::item([
		"name"=>"Purchasedetail",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"purchasedetail/create","text"=>"Create Purchasedetail","icon"=>"far fa-circle nav-icon"],
			["route"=>"purchasedetail","text"=>"Manage Purchasedetail","icon"=>"far fa-circle nav-icon"],
		]
	]);
