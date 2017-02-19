<?php

	return [
        'id' => 'crmapp-console',
        'basePath' => dirname(__DIR__),
        'components' => [
            'db' => require 'db.php'
        ],
		'params' => require 'params.php',
	];
