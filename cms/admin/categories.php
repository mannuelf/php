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
								$query = "INSERT INTO cms.categories(cat_title) ";
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
							<input type="submit" name="submit" aria-labelledby="submit" value="Add Category" class="btn btn-primary">
						</div>
					</form>

					<hr>

					<form action="categories.php" method="post" aria-labelledby="edit categories" class="form">
						<div class="form-group">
							<label aria-labelledby="edit category" for="cat_title">Update Category</label>
							<?php
							global $dbConnection;
							if(isset($_GET['edit'])) {
								$cat_id = $_GET['edit'];
								$query = "SELECT * FROM cms.categories WHERE cat_id = $cat_id ";
								$select_categories_id = mysqli_query($dbConnection, $query);

								while($row = mysqli_fetch_assoc($select_categories_id)) {
									$cat_id = $row['cat_title'];
									$cat_title = $row['cat_title'];
									?>

									<input value="<?php if(isset($cat_title)) { echo $cat_title; } ?>" type="text" name="cat_title" aria-labelledby="update category" title="update cat_title" class="form-control">

								<?php }} ?>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" aria-labelledby="submit" value="Update Category" class="btn btn-primary">
						</div>
					</form>
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
						<?php
							global $dbConnection;

							$query = "SELECT * FROM cms.categories";
							$select_categories = mysqli_query($dbConnection, $query);

							if (!$select_categories) {
								echo mysqli_error($select_categories);
							}

							while($row = mysqli_fetch_assoc($select_categories)) {
								$cat_id = $row['cat_id'];
								$cat_title = $row['cat_title'];
								echo "<tr>";
								echo "<td>{$cat_id}</td>";
								echo "<td>{$cat_title}</td>";
								echo "<td><a href='categories.php?delete={$cat_id}'> <i class='fa fa-fw fa-remove'></i> </a></td>";
								echo "<td><a href='categories.php?edit={$cat_id}'> <i class='fa fa-fw fa-edit'></i> </a></td>";
								echo "</tr>";
							}
						?>
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
	<?php include "includes/footer.php" ?>
