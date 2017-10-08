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
		$user_salt = $row['randSalt'];

		// move image to images folder
		move_uploaded_file($user_image_temp, "../images/$user_image");

		$query = "INSERT INTO cms.users(
			user_name,
			user_password,
			user_firstname,
			user_secondname,
			user_email,
			user_role,
			user_image,
			randSalt)";

		$query .= "VALUES(
			'{$user_name}',
			'{$user_password}',
			'{$user_firstname}',
			'{$user_secondname}',
			'{$user_email}',
			'{$user_role}',
			'{$user_image}',
			'{$randSalt}') ";

		$create_post_query = mysqli_query($dbConnection, $query);

		confirmQuery($create_post_query);
	}
?>
<h1>Add a user</h1>
<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="user_name">User Name</label>
		<input name="user_name" type="text" class="form-control">
	</div>

<!--	<div class="form-group">-->
<!--		<label for="post_category_id">Post Category ID</label>-->
<!--		<select name="post_category" class="form-control">-->
<!--			--><?php
//				global $dbConnection;
//				$query = "SELECT * FROM cms.categories";
//				$select_categories_id = mysqli_query($dbConnection, $query);
//
//				while($row = mysqli_fetch_assoc($select_categories_id)) {
//					$cat_id = $row['post_category_id'];
//					$cat_title = $row['cat_title'];
//					echo "<option value='{$cat_id}'>{$cat_title}</option>";
//				}
//			?>
<!--		</select>-->
<!--	</div>-->
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
		<input name="user_role" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="user_image">Image</label>
		<input name="user_image" type="file" class="form-control">
	</div>

	<div class="form-group">
		<label for="randSalt">Salt</label>
		<input name="randSalt" type="text" class="form-control">
	</div>

	<div class="form-group">
		<input type="submit" name="add_user" aria-labelledby="add_user" value="Add User" class="btn btn-primary">
	</div>
</form>
