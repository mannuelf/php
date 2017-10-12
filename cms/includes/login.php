<?php include "../database/db.php"; ?>

<?php
	if (isset($_POST['login'])) {
		echo "found";
		echo $username = $_POST['username'];
		echo $password = $_POST['password'];
	}
?>
