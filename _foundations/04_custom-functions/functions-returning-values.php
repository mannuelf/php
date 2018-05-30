<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Functions returning values</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
</head>
<body>

<?php

	function addNumbers($number1, $number2 ) {
		$sum =  $number1 + $number2;
		return $sum;
	}

	$result = addNumbers(30, 20);

	echo $result;

	echo "<br/>";

	$result = addNumbers(100, $result);

	echo $result;

	?>

</body>
</html>
