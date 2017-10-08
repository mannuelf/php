<?php
	if(isset($_POST['edit_user'])) {
		global $dbConnection;

		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password'];
		$user_firstname = $_POST['user_firstname'];
		$user_secondname = $_POST['user_secondname'];
		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];

		$user_image = $_FILES['user_image']['name'];
		$user_image_temp = $_FILES['user_image']['tmp_name'];

		// move image to images folder
		move_uploaded_file($user_image_temp, "../images/$user_image");

		$query = "INSERT INTO cms.users(
			user_name,
			user_password,
			user_firstname,
			user_secondname,
			user_email,
			user_role,
			user_image)";

		$query .= "VALUES(
			'{$user_name}',
			'{$user_password}',
			'{$user_firstname}',
			'{$user_secondname}',
			'{$user_email}',
			'{$user_role}',
			'{$user_image}') ";

		$create_user_query = mysqli_query($dbConnection, $query);
		confirmQuery($create_user_query);
	}
?>
<h2>Add a user</h2>
<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="user_name">Username</label>
		<input name="user_name" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="user_password">Password</label>
		<input name="user_password" type="password" class="form-control">
	</div>

	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input name="user_firstname" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="user_secondname">Second Name</label>
		<input name="user_secondname" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="user_email">Email</label>
		<input name="user_email" type="email" class="form-control">
	</div>

	<div class="form-group">
		<label for="user_role">Role</label>
		<select name="user_role" class="form-control">
			<option value="select options">Select Options</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		</select>
	</div>

	<div class="form-group">
		<label for="user_image">Image</label>
		<input name="user_image" type="file" class="form-control">
	</div>

	<div class="form-group">
		<input type="submit" name="edit_user" aria-labelledby="edit_user" value="Edit User" class="btn btn-primary">
	</div>
</form>
