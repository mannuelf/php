<?php
	// session_start();
	require_once './vendor/autoload.php';
	// Bootstrap the application
	require_once './bootstrap/start.php';

	use App\Models\Generic;

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$connectDb = (new Generic($db));
		$username = mysqli_real_escape_string($db, $username);
		$password = mysqli_real_escape_string($db, $password);

		foreach ($connectDb->userLogin($username) as $row) {
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
<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
	<!-- Login -->
	<div class="well">
		<h4>Login</h4>
		<form action="?" method="post">
			<div class="form-group">
				<div class="form-group">
					<input name="username" placeholder="username" type="text" class="form-control">
				</div>
				<div class="form-group">
					<input name="password" placeholder="Enter password" type="password" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit" name="login">
						Login
						<span class="glyphicon glyphicon-log-in"></span>
					</button>
					<a href="registration.php" class="btn btn-success">
						Register
						<span class="glyphicon glyphicon-log-in"></span>
					</a>
				</span>
			</div>
		</form>

		<!-- /.input-group -->
	</div>
	<!-- Blog Search Well -->
	<div class="well">
		<h4>Blog Search</h4>
		<form action="search.php" method="post">
			<div class="input-group">
				<input name="search" type="text" class="form-control">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit" name="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
		<!-- /.input-group -->
	</div>

	<!-- Blog Categories Well -->
	<div class="well">
		<h4>Blog Categories</h4>
		<div class="row">
			<div class="col-lg-6">
				<ul class="list-unstyled">
					<?php
						foreach ( (new Generic($db))->fetchCategories() as $row ) {
							$cat_title = $row['cat_title'];
							$cat_id = $row['cat_id'];
							//send a parameter of the category id
							echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
						}
					?>
				</ul>
			</div>
			<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->

	</div>

	<!-- Side Widget Well -->
	<?php include "includes/widget.php"; ?>

</div>
