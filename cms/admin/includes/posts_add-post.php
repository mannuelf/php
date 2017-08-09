<?php
	if(isset($_POST['add_post'])) {
		date_default_timezone_set('UTC');
		$post_title = $_POST['post_title'];
		$post_author = $_POST['post_author'];
		$post_date = date('d-m-y');
		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		$post_content = $_POST['post_content'];
		$post_tags = $_POST['post_tags'];
		$post_comment_count = 4;
		$post_status = $_POST['post_status'];

		move_uploaded_file($post_image_temp, "../image/$post_image");
	}
?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input name="post_title" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input name="post_author" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_date">Post Date</label>
		<input name="post_date" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input name="post_image" type="file" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" id="" cols="30" rows="10" type="text" class="form-control"></textarea>
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input name="post_tags" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_comment-count">Post Comment Count</label>
		<input name="post_comment_count" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input name="post_status" type="text" class="form-control">
	</div>

	<div class="form-group">
		<input type="submit" name="add_post" aria-labelledby="add_post" value="Add Post" class="btn btn-primary">
	</div>
</form>
