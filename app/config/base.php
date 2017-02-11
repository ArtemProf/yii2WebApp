<?php

$config = [
    'id'         => 'crmapp',
    'basePath'   => realpath(__DIR__ . '/../'),
    'vendorPath' => dirname(__DIR__)."/../vendor",
    'components' => [
        'request' => [
            'cookieValidationKey' => '0b0dcb5c339db8',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false
        ],
        'db' => require 'db.php'
    ],
    'params'     => require 'params.php',
];

if (YII_ENV_PROD) {
}

if (YII_ENV_DEV) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

return $config;