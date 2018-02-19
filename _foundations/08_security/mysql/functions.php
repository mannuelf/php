<?php

	function createUser() {
		global $connection;
		if(isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$username = mysqli_real_escape_string($connection, $username);
			$password = mysqli_real_escape_string($connection, $username);

			$hashFormat = "$2y$10$";
			$salt = "iusesomecrazystrings22";
			$hashFormatAndSalt =  $hashFormat . $salt;
			$password = crypt($password, $hashFormatAndSalt);

			$query = "INSERT INTO users(username, password)";
			$query .= "VALUES ('$username', '$password')";

			// take two parameters, connection and query
			$result = mysqli_query($connection, $query);
			if(!$result) {
				die('Query FAILED' . mysqli_error($connection));
			} else {
				echo "User CREATED";
			}
		}
	}

	function showAllData() {
		global $connection;

		$query = "SELECT * FROM users";
		$result = mysqli_query($connection, $query);

		if(!$result) {
			die('Query FAILED' . mysqli_error($connection));
		}

		while($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			echo "<option value='$id'>$id</option>";
		}
	}

	function readRows() {
		global $connection;

		$query = "SELECT * FROM users";
		$result = mysqli_query($connection, $query);

		if(!$result) {
			die('Query FAILED' . mysqli_error($connection));
		}
		while($row = mysqli_fetch_assoc($result)) {
			print_r($row);
		}
	}

    function updateUser() {
        if(isset($_POST['submit'])) {
            global $connection;
            $username = $_POST['username'];
            $password = $_POST['password'];
            $id = $_POST['id'];

            $query = "UPDATE users SET ";
            $query .= "username = '$username', ";
            $query .= "password = '$password' ";
            $query .= "WHERE id = $id ";

            $result = mysqli_query($connection, $query);

            if(!$result) {
                die("QUERY FAILED" . mysqli_error($connection));
            } else {
                echo "Record Updated";
            }
        }
    }

    function deleteUser() {
	    if(isset($_POST['submit'])) {
	        global $connection;
	        $username = $_POST['username'];
	        $password = $_POST['password'];
	        $id = $_POST['id'];

	        $query = "DELETE FROM users ";
	        $query .= "WHERE id = $id ";

	        $result = mysqli_query($connection, $query);

	        if(!$result) {
	            die("QUERY FAILED" . mysqli_error($connection));
	        } else {
	            echo "User Deleted";
	        }
	    }
	}
