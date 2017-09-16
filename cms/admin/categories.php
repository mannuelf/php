<?php include 'includes/admin_header.php' ?>

<div id="wrapper" class="categories">
	<!-- Navigation -->
	<?php include 'includes/admin_navigation.php' ?>
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
							<i class="fa fa-dashboard"></i>
							<a href="index.php">Dashboard</a>
						</li>
						<li class="active">
							<i class="fa fa-file"></i>
							Categories
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<!-- ADD Category form -->
					<?php
                        insert_categories();
                        include 'categories_add-categories.php';
                    ?>
					<hr>

					<!-- update category form -->
					<?php
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include 'categories_update-categories.php';
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

						<?php deleteCategories(); ?>

						</tbody>
					</table>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
	<?php include 'includes/admin_footer.php' ?>
