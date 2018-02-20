<?php

require_once 'vendor/autoload.php';

include "database/db.php";
include "includes/header.php";
include "includes/navigation.php";

use App\Models\Generic;
?>

<!-- Page Content -->
<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-8">
			<h1 class="page-header">
				For the love of programming.
				<small class="">Every day there is something new to learn.</small>
			</h1>
			<?php
			if (isset($_POST['submit'])) {
				$search = $_POST['search'];
				$results = Generic::fetchSearchResults($search);
				if (empty($results)) {
					echo "<h2>No result.</h2>";
				} else {
					foreach ($results as $row) {
						$post_title = $row['post_title'];
						$post_author = $row['post_author'];
						$post_date = $row['post_date'];
						$post_image = $row['post_image'];
						$post_content = $row['post_content'];
						$post_tags = $row['post_tags'];
						// break out of the while loop (meh looks dodgy but it works eh)
						?>
						<h2>
							<a href="#"><?php echo $post_title ?></a>
						</h2>
						<p class="lead">
							<small>
								by <a
									href="index.php"><?php echo $post_author ?></a>
								<span class="glyphicon glyphicon-time"></span>
								Posted on <?php echo $post_date ?>
								<span class="glyphicon glyphicon-tags"></span>
								Tags: <?php echo $post_tags ?>
							</small>
						</p>
						<hr>
						<img src="images/<?php echo $post_image ?>"
							 class="img-responsive"
							 alt="<?php echo $post_title ?>">
						<hr>
						<p><?php echo $post_content ?></p>
						<a class="btn btn-primary" href="#">Read More <span
								class="glyphicon glyphicon-chevron-right"></span></a>
						<hr>
					<?php }
				}
			} ?>
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
		<?php include "sidebar.php" ?>
	</div>
	<!-- /.row -->
	<?php include "includes/footer.php" ?>
