<?php
$query = 'SELECT * FROM cms.posts';

$select_all_posts = mysqli_query($dbConnection, $query);

if (!$select_all_posts) {
    echo mysqli_error($select_all_posts);
}

while ($row = mysqli_fetch_assoc($select_all_posts)) {
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
			by <a href="index.php"><?php echo $post_author ?></a>
			<span class="glyphicon glyphicon-time"></span>
			Posted on <?php echo $post_date ?>
			<span class="glyphicon glyphicon-tags"></span>
			Tags: <?php echo $post_tags ?></small>
	</p>
	<hr>
	<img src="images/<?php echo $post_image ?>"
		 class="img-responsive" alt="<?php echo $post_title ?>">
	<hr>
	<p><?php echo $post_content ?></p>
	<a class="btn btn-primary" href="#">Read More <span
			class="glyphicon glyphicon-chevron-right"></span></a>
	<hr>

<?php
} ?>




