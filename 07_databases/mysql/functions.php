<?php

	function createUser() {
		global $connection;
		if(isset($_POST['submit'])) {
			$username = $_POST['name'];
			$password = $_POST['password'];

			$query = "INSERT INTO users(name, password)";
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

    function updateUser() {
        global $connection;

		$username = $_POST['name'];
		$password = $_POST['password'];
		$id = $_POST['id'];

		$query = "UPDATE users SET ";
		$query .= "name = '$username', ";
		$query .= "password = '$password' ";
		$query .= "WHERE id = $id ";

		$result = mysqli_query($connection, $query);
		if(!$result) {
			die("Query FAILED ->" . mysqli_error($connection));
		} else {
			echo "<h5>Record UPDATED</h5>";
		}
    }

    function deleteUser() {
        global $connection;

        $id = $_POST['id'];

        $query = "DELETE FROM users ";
        $query .= "WHERE id = $id ";

        $result = mysqli_query($connection, $query);
        if(!$result) {
            die("Query FAILED ->" . mysqli_error($connection));
        } else {
            echo "<h5>USER DELETED</h5>";
        }
    }
