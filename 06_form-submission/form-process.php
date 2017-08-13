<?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $names = ['Allan', 'Ronaldo', 'Beckham'];
        $minimum = 5;
        $maximum = 10;

        if (strlen($username) < $minimum) {
            echo 'Username has to be longer than five';
        }

        if (strlen($username) > $maximum) {
            echo 'Username cannot be longer than ten';
        }

        if (!in_array($username, $names)) {
            echo 'Sorry you are not allowed in';
            echo '<br/>';
            echo 'Goodbye'.' '.$username;
        } else {
            echo 'Welcome';
            echo '<br/>';
            echo 'Hello'.' '.$username;
        }

        //echo "<br/>";
        //echo "Your Password is" . ' ' . $password;
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

<form action="form-process.php" method="post">
    <input type="text" placeholder="Enter Username" name="username">
    <input type="password" placeholder="Enter Password" name="password">
    <input type="submit" name="submit">
</form>

</body>
</html>
