<?php include "../database/db.php"; ?>

<?php
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = mysqli_real_escape_string($dbConnection, $username);
		$password = mysqli_real_escape_string($dbConnection, $password);

		$query = "SELECT * FROM cms.users WHERE username = '{ $username }'";
		$select_user_query = mysqli_query($dbConnection, $query);
		if ( ! $select_user_query) {
			die("QUERY FAILED" . mysqli_error($dbConnection));
		}
	}
?>
