<?php
$query = "SELECT * FROM cms.posts";
$select_posts = mysqli_query($dbConnection, $query);

confirmQuery($select_posts);

if (isset($_POST['checkBoxArray'])) {
	foreach($_POST['checkBoxArray'] as $postId) {
		$bulkOptions = $_POST['bulkOptions'];

		switch($bulkOptions) {
			case 'published':
				$query = "UPDATE cms.posts SET cms.posts.post_status='{$bulkOptions}' WHERE cms.posts.id='{$postId}'";
				$update_to_published_status = mysqli_query($dbConnection, $query);
				confirmQuery($update_to_published_status);
			break;
			case 'draft':
				$query = "UPDATE cms.posts SET cms.posts.post_status='{$bulkOptions}' WHERE cms.posts.id='{$postId}'";
				$update_to_draft_status = mysqli_query($dbConnection, $query);
				confirmQuery($update_to_draft_status);
			break;
			case 'delete':
				$query = "DELETE FROM cms.posts WHERE cms.posts.id='{$postId}'";
				$update_to_delete_status = mysqli_query($dbConnection, $query);
				confirmQuery($update_to_delete_status);
			break;
		}
	}
}
?>
<form action="" method="post">
	<div class="row col-lg-12 col-md-12">
		<div class="bulk-options-container col-xs-4">
			<select name="bulkOptions" id="" class="form-control">
				<option value="">Select options</option>
				<option value="published">Publish</option>
				<option value="draft">Draft</option>
				<option value="delete">Delete</option>
			</select>
		</div>
		<div class="col-xs-3">
			<input type="submit" class="btn btn-default">
			<a href="./posts.php?source=add_post"  class="btn btn-info">Add New</a>
		</div>
	</div>
	<div class="row col-lg-12 col-md-12">
		<table class="table table-hover table-bordered">
			<thead>
			<tr>
				<th><input class="jqSelectAllBoxes" type="checkbox"></th>
				<th>Id</th>
				<th>Author</th>
				<th>Title</th>
				<th>Category</th>
				<th>Status</th>
				<th>Image</th>
				<th>Content</th>
				<th>Tags</th>
				<th>Comments</th>
				<th>Date</th>
				<th>View</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			</thead>
			<tbody>
			<?php
			while ($row = mysqli_fetch_assoc($select_posts)) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				$post_category_id = $row['post_category_id'];
				$post_author = $row['post_author'];
				$post_date = $row['post_date'];
				$post_image = $row['post_image'];
				$post_content = $row['post_content'];
				$post_tags = $row['post_tags'];
				$post_comment_count = $row['post_comment_count'];
				$post_status = $row['post_status'];

				echo "<tr>";
				?>
					<td><input class='jqCheckBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
				<?php
				echo "<td>{$post_id}</td>";
				echo "<td>{$post_author}</td>";
				echo "<td>{$post_title}</td>";

				// fetch the category title from the DB
				$query = "SELECT * FROM cms.categories WHERE cms.categories.cat_id = {$post_category_id}";
				$select_categories_id = mysqli_query($dbConnection, $query);
				while ($row = mysqli_fetch_assoc($select_categories_id)) {
					$cat_id = $row['cat_id'];
					$cat_title = $row['cat_title'];
					echo "<td>{$cat_title}</td>";
				}
				echo "<td>{$post_status}</td>";
				echo "<td><img src='../images/{$post_image}' width='100px'></td>";
				echo "<td>{$post_content}</td>";
				echo "<td>{$post_tags}</td>";
				echo "<td>{$post_comment_count}</td>";
				echo "<td>{$post_date}</td>";
				echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
				echo "<td><a href='./posts.php?source=edit_post&p_id={$post_id}'>edit</a></td>";
				echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?');\" href='./posts.php?delete={$post_id}'>delete</a></td>";
				echo "</tr>";
			}
			?>
			<?php
			// DELETE A POST
			if (isset($_GET['delete'])) {
				global $dbConnection;
				$the_post_id = $_GET['delete'];
				$query = "DELETE FROM cms.posts WHERE id = {$the_post_id}";
				$delete_query = mysqli_query($dbConnection, $query);
				confirmQuery($delete_query);
			}
			?>
			</tbody>
		</table>

	</div>
</form>
