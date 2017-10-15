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
							<input type="submit" name="edit_user" aria-labelledby="edit_user" value="Edit User" class="btn btn-primary">
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
