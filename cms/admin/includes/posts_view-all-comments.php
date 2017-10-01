<?php
	$query = "SELECT * FROM cms.comments";
	$select_posts = mysqli_query($dbConnection, $query);

	confirmQuery($select_posts);
?>
<table class="table table-hover table-bordered">
	<thead>
	<tr>
		<th>Id</th>
		<th>Post</th>
		<th>Author</th>
		<th>Comment</th>
		<th>Email</th>
		<th>Status</th>
		<th><abbr title="Post Title That is related to this comment">Post Title</abbr></th>
		<th>Date</th>
		<th>Approve</th>
		<th>Unapproved</th>
		<th>Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php
		while($row = mysqli_fetch_assoc($select_posts)) {
			$comment_id = $row['comment_id'];
			$comment_post_id = $row['comment_post_id'];
			$comment_author = $row['comment_author'];
			$comment_content = $row['comment_content'];
			$comment_email = $row['comment_email'];
			$comment_status = $row['comment_status'];
			$comment_date = $row['comment_date'];

			echo "<tr>";
			echo "<td>{$comment_id}</td>";
			echo "<td>{$comment_post_id}</td>";
			echo "<td>{$comment_author}</td>";
			echo "<td>{$comment_content}</td>";
			echo "<td>{$comment_email}</td>";
			echo "<td>{$comment_status}</td>";
			$query = "SELECT * FROM cms.posts WHERE cms.posts.id = $comment_post_id";
			$select_posts_id_query = mysqli_query($dbConnection, $query);
			while ($row = mysqli_fetch_assoc($select_posts_id_query)) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
			}
			echo "<td>{$comment_date}</td>";
			echo "<td><a href='./comments.php?approve=$comment_id'>Approve</a></td>";
			echo "<td><a href='./comments.php?unapprove=$comment_id'>Unapprove</a></td>";
			echo "<td><a href='./comments.php?delete=$comment_id'>Delete</a></td>";
			echo "</tr>";
		}
	?>

	<?php
		// DELETE A COMMENT
		if(isset($_GET['delete'])) {
			$the_comment_id = $_GET['delete'];
			$query = "DELETE FROM cms.comments WHERE cms.comments.comment_id = {$the_comment_id}";
			$delete_query = mysqli_query($dbConnection, $query);
			header("Location: comments.php");
		}
		// Approve a comment
		if(isset($_GET['approve'])) {
			$the_comment_id = $_GET['approve'];
			$query = "UPDATE cms.comments SET cms.comments.comment_status = 'Approved' WHERE cms.comments.comment_id = {$the_comment_id}";
			$approve_comment_query = mysqli_query($dbConnection, $query);
			header("Location: comments.php");
		}
		// Unapprove a comment
		if(isset($_GET['unapprove'])) {
			$the_comment_id = $_GET['unapprove'];
			$query = "UPDATE cms.comments SET cms.comments.comment_status = 'Unapproved' WHERE cms.comments.comment_id = {$the_comment_id}";
			$unapprove_comment_query = mysqli_query($dbConnection, $query);
			header("Location: comments.php");
		}
	?>
	</tbody>
</table>
