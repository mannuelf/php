<?php include "database/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<!-- Page Content -->
<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-8">
			<h1 class="page-header">
				For the love of programming.
				<br>
				<small>Every day there is something new to learn.</small>
			</h1>
			<?php
			if (isset($_POST['submit'])) {
				$search = $_POST['search'];
				$query = "SELECT * FROM cms.posts WHERE post_tags LIKE '%$search%' ";
				$searchQuery = mysqli_query($dbConnection, $query);
				if (!$searchQuery) {
					die("QUERY FAILED" . mysqli_error($dbConnection));
				}
				$count = mysqli_num_rows($searchQuery);
				if ($count == 0) {
					echo "<h2>No result.</h2>";
				}
				else {
					// display the results
					include "includes/post.php";
				}

			}
			?>
			<!-- Pager -->
			<ul class="pager">
				<li class="previous">
					<a href="#">&larr; Older</a>
				</li>
				<li class="next">
					<a href="#">Newer &rarr;</a>
				</li>
			</ul>
		</div>
		<?php include "includes/sidebar.php" ?>
	</div>
	<!-- /.row -->
	<?php include "includes/footer.php" ?>
