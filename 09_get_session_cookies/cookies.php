<?php
	$name = "Manny";
	$value = 100;
	$expiration = time() + (60*60*24*7); // one week.
	setcookie($name,$value,$expiration);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cookies</title>
</head>
<body>

</body>
</html>