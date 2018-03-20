<?php


if(isset($_GET['p_id'])) {
	$post_id = $_GET['p_id'];
}

foreach ( (new (Generic($db)))->fetchPosts() as $row) {
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
	<img src="images/<?php echo $post_image ?>"
		 class="img-responsive" alt="<?php echo $post_title ?>">
	<hr>
	<p><?php echo $post_content ?></p>
	<a class="btn btn-primary" href="#">Read More <span
			class="glyphicon glyphicon-chevron-right"></span></a>
	<hr>

<?php } ?>
