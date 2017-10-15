<?php include "../database/db.php"; ?>
<?php session_start(); ?>

<?php
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = mysqli_real_escape_string($dbConnection, $username);
		$password = mysqli_real_escape_string($dbConnection, $password);
		$query = "SELECT * FROM cms.users WHERE cms.users.user_name = '{$username}'";
		$select_user_query = mysqli_query($dbConnection, $query);


		if ( ! $select_user_query) {
			die("QUERY FAILED" . mysqli_error($dbConnection));
		}

		while ($row = mysqli_fetch_array($select_user_query)) {
			var_dump('while here');
			$db_id = $row['id'];
			$db_firstname = $row['user_firstname'];
			$db_secondname = $row['user_secondname'];
			$db_username = $row['user_name'];
			$db_user_role = $row['user_role'];
			$db_user_image = $row['user_image'];
			$db_user_password = $row['user_password'];

			// validation
			if ( $username !== $db_username && $password !== $db_user_password) {
				header("Location: ../index.php");
			} else if ($username == $db_username && $password == $db_user_password) {
				// assign variables to the session so that the admin page can use the data to render stuff
				$_SESSION['username'] = $db_username;
				$_SESSION['firstname'] = $db_firstname;
				$_SESSION['secondname'] = $db_secondname;
				$_SESSION['user_role'] = $db_user_role;
				$_SESSION['user_image'] = $db_user_image;
				header("Location: ../admin/");
			} else {
				header("Location: ../index.php");
			}
		}
	}


?>
