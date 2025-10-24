<?php
	echo Menu::item([
		"name"=>"Purchaseorder",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"purchaseorder/create","text"=>"Create Purchaseorder","icon"=>"far fa-circle nav-icon"],
			["route"=>"purchaseorder","text"=>"Manage Purchaseorder","icon"=>"far fa-circle nav-icon"],
		]
	]);
