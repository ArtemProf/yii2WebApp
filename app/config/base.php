<?php

$config = [
    'id'         => 'crmapp',
    'basePath'   => realpath(__DIR__ . '/../'),
    'components' => [
        'request' => [
            'cookieValidationKey' => 'your secret key here',
        ],],
    'params'     => require 'params.php',
];

if (YII_ENV_PROD) {
}

if (YII_ENV_DEV) {
    ini_set('display_errors', true);
}

return $config;