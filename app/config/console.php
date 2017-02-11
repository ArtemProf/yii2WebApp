<?php

	$config = require 'base.php';

	return [
        'id' => 'crmapp-console',
        'basePath' => dirname(__DIR__),
        'components' => [
            'db' => require(__DIR__ . '/db.php'),
        ],
		'params' => require 'params.php',
	];
