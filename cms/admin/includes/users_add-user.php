<?php
	if(isset($_POST['add_user'])) {
		global $dbConnection;

		$user_id = $row['id'];
		$user_name = $row['user_name'];
		$user_password = $row['user_password'];
		$user_firstname = $row['user_firstname'];
		$user_secondname = $row['user_secondname'];
		$user_email = $row['user_email'];
		$user_role = $row['user_role'];
		$user_image = $row['user_image'];
		$user_temp_image = $row['user_image'];

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

		$create_post_query = mysqli_query($dbConnection, $query);

		confirmQuery($create_post_query);
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
		<input name="user_password" type="text" class="form-control">
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
		<input name="user_email" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="user_role">Role</label>
		<select name="user_role" class="form-control">
			<?php
				global $dbConnection;
				$query = "SELECT * FROM cms.users";
				$select_users = mysqli_query($dbConnection, $query);
				confirmQuery($select_users);
				while($row = mysqli_fetch_assoc($select_users)) {
					$user_id = $row['id'];
					$user_role = $row['user_role'];
					echo "<option value='{$user_id}'>{$user_role}</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="user_image">Image</label>
		<input name="user_image" type="file" class="form-control">
	</div>

	<div class="form-group">
		<input type="submit" name="add_user" aria-labelledby="add_user" value="Add User" class="btn btn-primary">
	</div>
</form>
