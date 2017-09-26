<?php
$query = 'SELECT * FROM cms.posts';

$select_all_posts = mysqli_query($dbConnection, $query);

if (!$select_all_posts) {
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
    $post_tags = $row['post_tags'];
    // break out of the while loop (meh looks dodgy but it works eh) ?>
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

<?php
} ?>
<!-- Blog Comments -->

<!-- Comments Form -->
<div class="well">
	<h4>Leave a Comment:</h4>
	<form role="form">
		<div class="form-group">
			<textarea class="form-control" rows="3"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
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
