<?php include "includes/admin_header.php" ?>
<div id="wrapper" class="categories">
	<!-- Navigation -->
	<?php include "includes/admin_navigation.php" ?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<?php
							if (isset($_SESSION['username'])) {
								echo $_SESSION['username'];
							}
						?>
					</h1>
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
						</li>
						<li class="active">
							<i class="fa fa-file"></i> Posts
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form action="" method="post" enctype="multipart/form-data">
						<?php
							global $dbConnection;
							if (isset($_SESSION['username'])) {
								$username = $_SESSION['username'];

								$query = "SELECT * FROM cms.users WHERE cms.users.user_name = '{$username}' ";
								$select_users_query = mysqli_query($dbConnection, $query);

								while ($row = mysqli_fetch_array($select_users_query)) {
									$user_id = $row['id'];
									$user_name = $row['user_name'];
									$user_password = $row['user_password'];
									$user_firstname = $row['user_firstname'];
									$user_secondname = $row['user_secondname'];
									$user_email = $row['user_email'];
									$user_role = $row['user_role'];
									$user_image = $row['user_image'];
								}
							}
						?>
						<div class="form-group">
							<label for="user_name">Username</label>
							<input name="user_name" type="text" value="<?php echo $user_name; ?>" placeholder="<?php echo $user_name; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label for="user_password">Password</label>
							<input name="user_password" type="password" value="<?php echo $user_password; ?>" placeholder="<?php echo $user_password; ?>"  class="form-control">
						</div>

						<div class="form-group">
							<label for="user_firstname">First Name</label>
							<input name="user_firstname" type="text" value="<?php echo $user_firstname; ?>" placeholder="<?php echo $user_firstname; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label for="user_secondname">Second Name</label>
							<input name="user_secondname" type="text" value="<?php echo $user_secondname; ?>" placeholder="<?php echo $user_secondname; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label for="user_email">Email</label>
							<input name="user_email" type="email" value="<?php echo $user_email; ?>" placeholder="<?php echo $user_email; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label for="user_role">Role</label>
							<select name="user_role" class="form-control">
								<option value="subscriber"> Choose one</option>
								<?php
									if($user_role == 'admin') {
										echo "<option value='subscriber'>Subscriber</option>";
									} else {
										echo "<option value='admin'>Admin</option>";
									}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="user_image">Image</label> <br>
							<img src="../images/<?php echo $user_image?>" width="100px" alt="">
						</div>
						<div class="form-group">
							<input name="user_image" type="file" class="form-control">
						</div>

						<div class="form-group">
							<input type="submit" name="update_profile" aria-labelledby="update_profile" value="Update Profile" class="btn btn-primary">
						</div>
					</form>

				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
	<?php include "includes/admin_footer.php" ?>
