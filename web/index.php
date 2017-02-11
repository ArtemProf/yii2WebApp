<?php

    // Getting the configuration (2)
    define('BASE_PATH', dirname(__DIR__));

    defined('YII_DEBUG') or define('YII_DEBUG', substr($_SERVER['HTTP_HOST'], -4) === '.dev');
    defined('YII_ENV') or define('YII_ENV', YII_DEBUG ? 'dev' : 'production');

    require BASE_PATH.'/vendor/autoload.php';
    require BASE_PATH.'/vendor/yiisoft/yii2/Yii.php';
    require BASE_PATH.'/app/config/bootstrap.php';
    $config = require BASE_PATH.'/app/config/base.php';

    (new yii\web\Application( $config ))->run();