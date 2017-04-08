<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>switch statements</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
</head>
<body>

<?php

	$number = 30;

	switch ($number) {
		case 24:
		echo "is it 24";
		break;

		case 30:
		echo "is it 30";
		break;

		case 89:
		echo "is it 89";
		break;
		default :
		echo "We could not find anything";
		break;
	}
?>


</body>
</html>
