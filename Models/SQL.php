<?php
    define('DB_HOST', 'localhost');

    define('DB_NAME', 'irotas');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');

    define('DB_CHARSET', 'utf8');

    // Create connection
    $MySQL = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
