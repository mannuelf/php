<?php
    /*
     * please check the  README for more details on creating a
     * local test database for this demo
     */
	$connection = mysqli_connect(
		'localhost',
		'root',
		'root',
		'loginapp'
	);

	if(!$connection) {
		echo "<h1>Connection Failed</h1>";
	}
