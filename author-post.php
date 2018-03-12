<?php

require_once 'vendor/autoload.php';

include "database/db.php";
include "includes/header.php";
include "includes/navigation.php";
include "includes/functions.php";
use App\Models\Generic;

?>
<!-- Page Content -->
<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-8">
			<?php
				if(isset($_GET['author'])) {
					$the_post_author = $_GET['author'];
				}
				if ( ! empty($rows) ) {
					foreach ((new Generic($db))->fetchPostsByAuthor($the_post_author) as $row) {
						$post_id = $row['id'];
						$post_title = $row['post_title'];
						$post_author = $row['post_author'];
						$post_date = $row['post_date'];
						$post_image = $row['post_image'];
						$post_content = $row['post_content'];
						$post_tags = $row['post_tags'];

						?>
						<h2>
							<!--
								Pass the url a parameter with the key of the array of the GET super global for the id's
								when users click on the title we sending the parameter in th url of the post(article) id
								-->
							<a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
						</h2>
						<p class="lead">
							<small>
								All Posts by <?php echo $post_author ?>

								Posted on <?php echo $post_date ?>
								<span class="glyphicon glyphicon-tags"></span>
								Tags: <?php echo $post_tags ?>
							</small>
						</p>
						<hr>
						<img src="images/<?php echo $post_image ?>" class="img-responsive" alt="<?php echo $post_title ?>">
						<hr>
						<p><?php echo $post_content ?></p>
						<hr>

			<?php } } ?>
			<hr>
		</div>

		<?php include "sidebar.php" ?>
	</div>
	<!-- /.row -->
	<?php include "includes/footer.php" ?>
</div>
