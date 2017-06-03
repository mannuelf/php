
<?php
	$db['db_host']= 'localhost';
	$db['db_user']= 'root';
	$db['db_pass']= 'root';
	$db['db_name']= 'cms';

	foreach ($db as $key => $value) {
		define(strtoupper($key), $value);
	}
	var_dump($db);

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($connection) {
		echo "We are connected";
	} else {
		echo "Error with connection";
	}






