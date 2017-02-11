<?php

if(file_exists(__DIR__.DIRECTORY_SEPARATOR."db.local.php"))
    $db = require_once "db.local.php";
else
    $db = [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=buduguru',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ];

return $db;