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
						Categories
						<small>Author</small>
					</h1>
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
						</li>
						<li class="active">
							<i class="fa fa-file"></i> Categories
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">

					<?php insert_categories(); ?>

					<form action="categories.php" method="post" aria-labelledby="categories" class="form">
						<div class="form-group">
							<label aria-label="cat_title" for="cat_title">Add Category</label>
							<input type="text" name="cat_title" aria-labelledby="cat_title" title="cat_title" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="submit" aria-labelledby="submit" value="Add Category" class="btn btn-primary">
						</div>
					</form>

					<hr>
					<!-- update category form -->
					<?php
						if(isset($_GET['edit'])) {
							$cat_id = $_GET['edit'];
							include "update_categories.php";
						}
					?>
				</div>
				<div class="col-xs-6">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Category</th>
								<th></th>
							</tr>
						</thead>
						<tbody>

						<?php findAllCategories(); ?>

						<?php
							// DELETE QUERY
							global $dbConnection;
							if (isset($_GET['delete'])) {
								$the_cat_id = $_GET['delete'];
								$query = "DELETE FROM cms.categories WHERE cat_id = {$the_cat_id}";
								$delete_query = mysqli_query($dbConnection, $query);
								header("Location: categories.php");
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
	<?php include "includes/admin_footer.php" ?>
