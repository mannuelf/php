<?php

use App\Database\Connection;

$config = [
	'host' => '127.0.0.1',
	'user' => 'root',
	'pass' => '',
	'schema' => 'cms',
];

$db = (new Connection($config))->connect();
