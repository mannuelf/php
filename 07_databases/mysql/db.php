<?php

	$connection = mysqli_connect(
		'localhost',
		'root',
		'root',
		'loginapp'
	);

	if(!$connection) {
		echo "<h1>Connection Failed</h1>";
	}
