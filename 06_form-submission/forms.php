<?php
    if(isset($_POST['submit'])) {
        echo "Yes it works";
    }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Forms</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
</head>
<body>

<form action="forms.php" method="post">
    <input type="text" placeholder="Enter Username" name="username">
    <input type="password" placeholder="Enter Password" name="password">
    <input type="submit" name="submit">
</form>

<?php

?>

</body>
</html>
