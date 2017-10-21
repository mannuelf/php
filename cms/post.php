<?php include "database/db.php" ?>
<?php include "includes/functions.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
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

			confirmQuery($select_all_posts);

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
				<hr>

			<?php } ?>
			<!-- Blog Comments -->

			<?php
				// Create comment query
				if(isset($_POST["create_comment"])) {
					$the_post_id = $_GET['p_id'];
					$comment_author = $_POST['comment_author'];
					$comment_email = $_POST['comment_email'];
					$comment_content = $_POST['comment_content'];

					$comment_query = "INSERT INTO cms.comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
					$comment_query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

					$create_comment_query = mysqli_query($dbConnection, $comment_query);
					$comment_query = "UPDATE cms.posts SET cms.posts.post_comment_count = post_comment_count + 1 WHERE cms.posts.id = {$the_post_id} ";
					$update_comment_count = mysqli_query($dbConnection, $comment_query);
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
			<?php
				$show_comment_query = "SELECT * FROM cms.comments WHERE cms.comments.comment_post_id = {$the_post_id} ";
				$show_comment_query .= "AND cms.comments.comment_status = 'Approved' ";
				$show_comment_query .= "ORDER BY cms.comments.comment_id DESC ";

				$select_comment_query = mysqli_query($dbConnection, $show_comment_query);
				confirmQuery($select_comment_query);

				while ($row = mysqli_fetch_array($select_comment_query)) {
					$comment_date = $row['comment_date'];
					$comment_content = $row['comment_content'];
					$comment_author = $row['comment_author'];
				?>
					<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/64x64" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">
								<?php echo $comment_author; ?>
								<small><?php echo $comment_date; ?></small>
							</h4>
							<?php echo $comment_content; ?>
						</div>
					</div>
			<?php var_dump($comment_author,$comment_content); } ?>

		</div>
		<?php include "sidebar.php" ?>
	</div>
	<!-- /.row -->
	<?php include "includes/footer.php" ?>
