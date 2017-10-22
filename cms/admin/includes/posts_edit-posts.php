<?php
global $dbConnection;

// EDIT A POST OF GIVEN POST ID
if (isset($_GET['p_id'])) {
	$the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM cms.posts WHERE cms.posts.id = $the_post_id ";

$select_posts_by_id = mysqli_query($dbConnection, $query);

confirmQuery($select_posts_by_id);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
	$post_id = $row['id'];
	$post_cat_id = $row['post_category_id'];
	$post_title = $row['post_title'];
	$post_author = $row['post_author'];
	$post_date = $row['post_date'];
	$post_image = $row['post_image'];
	$post_content = $row['post_content'];
	$post_tags = $row['post_tags'];
	$post_comment_count = $row['post_comment_count'];
	$post_status = $row['post_status'];
}

if(isset($_POST['edit_post'])) {
	$post_title = $_POST['post_title'];
	$post_author = $_POST['post_author'];
	$post_image = $_FILES['post_image']['name'];
	$post_image_temp = $_FILES['post_image']['tmp_name'];
	$post_content = $_POST['post_content'];
	$post_tags = $_POST['post_tags'];
	$post_comment_count = $_POST['post_comment_count'];
	$post_status = $_POST['post_status'];

	move_uploaded_file($post_image_temp, "../images/$post_image");

	$query = "UPDATE cms.posts SET ";
		$query .= "post_title = '{$post_title}', ";
		$query .= "post_author = '{$post_author}', ";
		$query .= "post_content = '{$post_content}', ";
		$query .= "post_image = '{$post_image}', ";
		$query .= "post_tags = '{$post_tags}', ";
		$query .= "post_comment_count= '{$post_comment_count}', ";
		$query .= "post_status = '{$post_status}' ";
	$query .= "WHERE cms.posts.post_category_id = '{$the_post_id}' ";

	$edit_post = mysqli_query($dbConnection, $query);
	confirmQuery($edit_post);
}

?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input value="<?php echo $post_title; ?>" name="post_title" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label for="post_categories">Categories</label>
		<select name="post_category" class="form-control">
			<?php
				global $dbConnection;
				$query = "SELECT * FROM cms.categories ";
				$select_categories_id = mysqli_query($dbConnection, $query);

				confirmQuery($select_categories_id);

				while($row = mysqli_fetch_assoc($select_categories_id)) {
					$post_cat_id = $row['cat_id'];
					$cat_title = $row['cat_title'];
					echo "<option value='{$post_cat_id}'>{$cat_title}</option>";
				}
			?>
		</select>
	</div>
	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input value="<?php echo $post_author; ?>" name="post_author" type="text" class="form-control">
	</div>
	<div class="form-group">
		<img src="../images/<?php echo $post_image; ?>" width="200" alt=""> <br>
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
		<label for="post_status">Post Status</label> <br>
		<select name="post_status" id="">
			<option value='<?php echo $post_status; ?>' class="form-control"><?php echo $post_status; ?></option>
			<?php
				if ($post_status == 'published') {
					echo "<option name='draft'>Draft</option>";
				} else {
					echo "<option name='published'>Published</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" id="" cols="30" rows="10" type="text" class="form-control"><?php echo $post_content; ?></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="edit_post" aria-labelledby="edit_post" value="SAVE" class="btn btn-primary">
	</div>
</form>
