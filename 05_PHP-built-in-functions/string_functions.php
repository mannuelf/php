<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>String Functions</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
</head>
<body>

<h2>
<?php

    $string = 'Hello whats up, hows it going';
    echo strlen($string);
    echo '<br/>';

    echo strtoupper($string);
    echo '<br/>';

    echo strtolower($string);
    echo '<br/>';

    echo str_repeat($string, 4);
    echo '<br/>';

    echo str_shuffle($string);
?>
</h2>
</body>
</html>
