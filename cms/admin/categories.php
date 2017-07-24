<?php include "includes/header.php" ?>
<div id="wrapper" class="categories">
	<!-- Navigation -->
	<?php include "includes/navigation.php" ?>
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
					<?php
						global $dbConnection;
						if(isset($_POST['submit'])) {
							$cat_title = $_POST['cat_title'];
							if ($cat_title == "" || empty($cat_title)) {
								echo "This field cannot be empty";
							} else {
								// construct query
								$query = "INSERT INTO cms.categories ";
								$query .= "VALUE('{$cat_title}') ";
								// submit to db
								$create_category_query = mysqli_query($dbConnection, $query);
								echo "SUCCESS you have added a new category";
								if (!$create_category_query) {
									die('Query Failed' . mysqli_error($dbConnection));
								}
							}
						}
					?>
					<form action="categories.php" method="post" aria-labelledby="categories" class="form">
						<div class="form-group">
							<label aria-label="cat_title" for="cat_title">Add Category</label>
							<input type="text" name="cat_title" aria-labelledby="cat_title" title="cat_title" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" aria-labelledby="submit" value="Add Category" class="btn btn-primary">
						</div>
					</form>
				</div>
				<div class="col-xs-6">
					<table class="table table-hover table-bordered">
						<?php
							global $dbConnection;

							$query = "SELECT * FROM cms.categories";
							$select_categories = mysqli_query($dbConnection, $query);

							if(! $select_categories) {
								echo mysqli_error($select_categories);
							}
						?>
						<thead>
						<tr>
							<th>ID</th>
							<th>Category</th>
						</tr>
						</thead>
						<tbody>
						<?php
							while($row = mysqli_fetch_assoc($select_categories)) {
								$cat_id = $row['cat_id'];
								$cat_title = $row['cat_title'];
								echo "<tr>";
								echo "<td>{$cat_id}</td>";
								echo "<td>{$cat_title}</td>";
								echo "</tr>";
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
	<?php include "includes/footer.php" ?>
