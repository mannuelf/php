<?php include "database/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php include "functions.php" ?>
<!-- Page Content -->
<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-8">
			<?php

			if(isset($_GET['p_id'])) {
				$the_post_id = $_GET['p_id'];
			}

			$query = "SELECT * FROM cms.posts WHERE cms.posts.id = $the_post_id ";

			$select_all_posts = mysqli_query($dbConnection, $query);

			if ( ! $select_all_posts) {
				echo mysqli_error($select_all_posts);
			}

			while ($row = mysqli_fetch_assoc($select_all_posts)) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				$post_author = $row['post_author'];
				$post_date = $row['post_date'];
				$post_image = $row['post_image'];
				$post_content = $row['post_content'];
				$post_tags = $row['post_tags'];
				// break out of the while loop (meh looks dodgy but it works eh)
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
						by <a href="index.php"><?php echo $post_author ?></a>
						<span class="glyphicon glyphicon-time"></span>
						Posted on <?php echo $post_date ?>
						<span class="glyphicon glyphicon-tags"></span>
						Tags: <?php echo $post_tags ?>
					</small>
				</p>
				<hr>
				<img src="images/<?php echo $post_image ?>" class="img-responsive" alt="<?php echo $post_title ?>">
				<hr>
				<p><?php echo $post_content ?></p>
				<a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
				<hr>

			<?php } ?>
			<!-- Blog Comments -->

			<?php
				if(isset($_POST["create_comment"])) {
					$the_post_id = $_GET['p_id'];
					$comment_author = $_POST['comment_author'];
					$comment_email = $_POST['comment_email'];
					$comment_content = $_POST['comment_content'];

					$query = "INSERT INTO comments (comment_post_id, comment_author,
													comment_email, comment_content, 
													comment_status, comment_date)";
					$query .= "VALUES ($the_post_id, '{$comment_author}',
								'{$comment_email}',
								'{$comment_content}',
								'unapproved',
								now() )";

					$create_comment_query = mysqli_connect($dbConnection, $query);
					confirmQuery($create_comment_query);

				}
			?>
			<!-- Comments Form -->
			<div class="well">
				<h4>Leave a Comment:</h4>
				<form action="" method="post" role="form">

					<div class="form-group">
						<label for="Author">Author</label>
						<input type="text" name="comment_author" placeholder="Author" class="form-control">
					</div>

					<div class="form-group">
						<label for="Email">Email</label>
						<input type="email" name="comment_email" placeholder="Email" class="form-control">
					</div>

					<div class="form-group">
						<textarea name="comment_content" class="form-control" rows="3" placeholder="Comment"></textarea>
					</div>
					<button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
				</form>
			</div>

			<hr>

			<!-- Comment -->
			<div class="media">
				<a class="pull-left" href="#">
					<img class="media-object" src="http://placehold.it/64x64" alt="">
				</a>
				<div class="media-body">
					<h4 class="media-heading">Start Bootstrap
						<small>August 25, 2014 at 9:30 PM</small>
					</h4>
					Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
				</div>
			</div>

			<!-- Comment -->
			<div class="media">
				<a class="pull-left" href="#">
					<img class="media-object" src="http://placehold.it/64x64" alt="">
				</a>
				<div class="media-body">
					<h4 class="media-heading">Start Bootstrap
						<small>August 25, 2014 at 9:30 PM</small>
					</h4>
					Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
					<!-- Nested Comment -->
					<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/64x64" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Nested Start Bootstrap
								<small>August 25, 2014 at 9:30 PM</small>
							</h4>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
						</div>
					</div>
					<!-- End Nested Comment -->
				</div>
			</div>

		</div>
		<?php include "includes/sidebar.php" ?>
	</div>
	<!-- /.row -->
	<?php include "includes/footer.php" ?>
