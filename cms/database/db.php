
<?php
    $db['db_host'] = 'localhost';
    $db['db_user'] = 'root';
    $db['db_pass'] = 'root';
    $db['db_name'] = 'cms';

    foreach ($db as $key => $value) {
        define(strtoupper($key), $value);
    }

    $dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

    if (!$dbConnection) {
        die('Connection Error: '.mysqli_connect_error());
    }
