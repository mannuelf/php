<?php

session_start();

require_once '../vendor/autoload.php';
use App\Models\Generic;

?>

<?php
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = mysqli_real_escape_string($dbConnection, $username);
		$password = mysqli_real_escape_string($dbConnection, $password);

		$generic = new Generic ($db);

		foreach ($generic->userLogin($username) as $row) {
			$db_id = $row['id'];
			$db_firstname = $row['user_firstname'];
			$db_secondname = $row['user_secondname'];
			$db_username = $row['user_name'];
			$db_user_role = $row['user_role'];
			$db_user_image = $row['user_image'];
			$db_user_password = $row['user_password'];

			$password = crypt($password, $db_user_password);

			// validation
			if ( $username !== $db_username && $password !== $db_user_password) {
				header("Location: ../index.php");
			} else {
				// assign variables to the session so that the admin page can use the data to render stuff
				$_SESSION['username'] = $db_username;
				$_SESSION['firstname'] = $db_firstname;
				$_SESSION['secondname'] = $db_secondname;
				$_SESSION['user_role'] = $db_user_role;
				$_SESSION['user_image'] = $db_user_image;
				header("Location: ../admin/index.php");
			}
		}
	}
?>
