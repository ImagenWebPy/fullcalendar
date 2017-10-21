<?php

$host = getHost();
switch ($host) {
    case 'garden.com.py':
        define('DB_USER', 'web');
        define('DB_PASS', 'WebG@rdenMKT');
        define('DB_NAME', 'calendariobtl');
        break;
    case 'www.garden.com.py':
        define('DB_USER', 'web');
        define('DB_PASS', 'WebG@rdenMKT');
        define('DB_NAME', 'calendariobtl');
        break;
    case 'localhost':
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'calendar');
        break;
    default :
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'calendar');
        break;
}
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
// This is for database passwords only
define('HASH_PASSWORD_KEY', '!@123456789ABCDEFGHIJKLMNOPRSTWYZ[¿]{?}<->');

function getHost() {
    $host = $_SERVER['HTTP_HOST'];
    return $host;
}
