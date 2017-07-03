<?php include "includes/header.php" ?>

<div id="wrapper">
	<!-- Navigation -->
	<?php include "includes/navigation.php" ?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Welcome to CMS Admin
						<small>Author</small>
						<?php if ($dbConnection) { echo "connected"; } ?>
					</h1>

					<ol class="breadcrumb">
						<li>
							<i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
						</li>
						<li class="active">
							<i class="fa fa-file"></i> Blank Page
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<form action="" method="post" aria-labelledby="categories" class="">
						<div class="form-group">
							<label aria-label="category title" for="cat_title">Add Category</label>
							<input type="text" name="cat_title" aria-labelledby="category title" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" aria-labelledby="submit" value="Add Category" class="btn btn-default">
						</div>
					</form>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
	<?php include "includes/footer.php" ?>
