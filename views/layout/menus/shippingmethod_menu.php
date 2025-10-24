<?php
	echo Menu::item([
		"name"=>"Shippingmethod",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"shippingmethod/create","text"=>"Create Shippingmethod","icon"=>"far fa-circle nav-icon"],
			["route"=>"shippingmethod","text"=>"Manage Shippingmethod","icon"=>"far fa-circle nav-icon"],
		]
	]);
