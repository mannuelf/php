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
						Users
						<small>- All the comments from the posts</small>
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
				<?php
					if(isset($_GET['source'])) {
						$source = $_GET['source'];
					} else {
						$source = "";
					}
					switch($source) {
						case "add_user":
							include "./includes/users_add-user.php";
							break;
						case "edit_user":
							include "./includes/users_edit-user.php";
							break;
						default;
							include "./includes/users_view-all-users.php";
							break;
					}
				?>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
	<?php include "includes/admin_footer.php" ?>
