<?php include "database/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<!-- Page Content -->
<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-8">
			<h1 class="page-header">
				For the love of programming. <br>
				<small>Every day there is something new to learn.</small>
			</h1>
			<?php
			$query = "SELECT * FROM cms.posts WHERE cms.posts.post_status = 'Published' ";

			$select_all_posts = mysqli_query($dbConnection, $query);

			if ( ! $select_all_posts) {
				echo mysqli_error($select_all_posts);
			}

			if (isset($_GET['p_id'])) {
				$post_id = $_GET['p_id'];
			}

			while ($row = mysqli_fetch_assoc($select_all_posts)) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				$post_author = $row['post_author'];
				$post_date = $row['post_date'];
				$post_image = $row['post_image'];
				$post_content = $row['post_content'];
				$post_tags = substr($row['post_tags'], 0, 50);
				$post_status = $row['post_status'];

				if($post_status == 'published') {
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
				<img src="images/<?php echo $post_image ?>"
					 class="img-responsive" alt="<?php echo $post_title ?>">
				<hr>
				<p><?php echo $post_content ?></p>
				<a class="btn btn-primary" href="./post.php?p_id=<?php echo $post_id ?>">Read More <span
						class="glyphicon glyphicon-chevron-right"></span></a>
				<hr>

			<?php } } ?>

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
