
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
		<label for="post_image">Post Image</label>
		<input name="post_image" type="file" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input name="post_tags" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_comment_count">Post Comment Count</label>
		<input name="post_comment_count" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input name="post_status" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" id="" cols="30" rows="10" type="text" class="form-control"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="add_post" aria-labelledby="add_post" value="Add Post" class="btn btn-primary">
	</div>
</form>
