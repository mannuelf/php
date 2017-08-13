<?php
    echo $_POST['name'];
    print_r($_POST['name']);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Post</title>
</head>
<body>
<form action="./post.php" method="post">
	<input type="text" name="name" value="">
	<input type="button" value="submit">
</form>
</body>
</html>
