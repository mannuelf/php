<?php
	if(isset($_POST['add_post'])) {
		global $dbConnection;
		
		date_default_timezone_set('UTC');
		$post_category_id = $_POST['post_category_id'];
		$post_title = $_POST['post_title'];
		$post_author = $_POST['post_author'];
		$post_date = date('d-m-y');
		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		$post_content = $_POST['post_content'];
		$post_tags = $_POST['post_tags'];
		$post_comment_count = 4;
		$post_status = $_POST['post_status'];

		// move image to images folder
		move_uploaded_file($post_image_temp, "../images/$post_image");

		$query = "INSERT INTO cms.posts(
			post_category_id,
			post_title, 
			post_author, 
			post_date, 
			post_image, 
			post_content, 
			post_tags, 
			post_comment_count, 
			post_status) ";
		
		$query .= "VALUES(
			 {$post_category_id},
			'{$post_title}',
			'{$post_author}', 
			  now(),
			'{$post_image}',
			'{$post_content}',
			'{$post_tags}',
			'{$post_comment_count}',
			'{$post_status}' ) ";
		
		var_dump($query);
		
		$create_post_query = mysqli_query($dbConnection, $query);

		confirmQuery($create_post_query);
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
		<input name="post_date" type="date" class="form-control">
	</div> 

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input name="post_image" type="file" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" id="" cols="30" rows="10" 
		type="text" class="form-control"></textarea>
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
		<input type="submit" name="add_post" aria-labelledby="add_post" value="Add Post" class="btn btn-primary">
	</div>
</form>
