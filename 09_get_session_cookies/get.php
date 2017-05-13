<?php
	print_r($_GET);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>GET</title>
</head>
<body>
<?php
	$id = 1011;
?>

<a href="./get.php?id=<?php echo $id; ?>">CLICK</a>

</body>
</html>
