<?php
global $dbConnection;

// EDIT A POST OF GIVEN POST ID
if (isset($_GET['p_id'])) {
	$get_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM cms.posts ";
$select_posts_by_id = mysqli_query($dbConnection, $query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
	$post_id = $row['id'];
	$cat_id = $row['post_category_id'];
	$post_title = $row['post_title'];
	$post_author = $row['post_author'];
	$post_date = $row['post_date'];
	$post_image = $row['post_image'];
	$post_content = $row['post_content'];
	$post_tags = $row['post_tags'];
	$post_comment_count = $row['post_comment_count'];
	$post_status = $row['post_status'];
}
?>
<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input value="<?php echo $post_title; ?>" name="post_title" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input value="<?php echo $post_author; ?>" name="post_author" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input name="post_image" type="file" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input value="<?php echo $post_tags; ?>" name="post_tags" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_comment_count">Post Comment Count</label>
		<input value="<?php echo $post_comment_count; ?>" name="post_comment_count" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input value="<?php echo $post_status; ?>" name="post_status" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" id="" cols="30" rows="10" type="text" class="form-control">
			<?php echo $post_content; ?>
		</textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="add_post" aria-labelledby="add_post" value="Add Post" class="btn btn-primary">
	</div>
</form>
