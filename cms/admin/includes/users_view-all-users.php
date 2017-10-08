<?php
	$query = "SELECT * FROM cms.users";
	$select_users = mysqli_query($dbConnection, $query);

	confirmQuery($select_users);
?>
<table class="table table-hover table-bordered">
	<thead>
	<tr>
		<th>Id</th>
		<th>User Name</th>
		<th>Password</th>
		<th>First Name</th>
		<th>Second Name</th>
		<th>Email</th>
		<th>Image</th>
		<th>Role</th>
		<th>randSalt</th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php
		while($row = mysqli_fetch_assoc($select_users)) {
			$user_id = $row['id'];
			$user_name = $row['user_name'];
			$user_password = $row['user_password'];
			$user_firstname = $row['user_firstname'];
			$user_secondname = $row['user_secondname'];
			$user_email = $row['user_email'];
			$user_role = $row['user_role'];
			$user_image = $row['user_image'];
			$user_salt = $row['randSalt'];

			echo "<tr>";
			echo "<td>{$user_id}</td>";
			echo "<td>{$user_name}</td>";
			echo "<td>{$user_password}</td>";
			echo "<td>{$user_firstname}</td>";
			echo "<td>{$user_secondname}</td>";
			echo "<td>{$user_email}</td>";
			echo "<td>{$user_role}</td>";
			echo "<td>{$user_image}</td>";
			echo "<td>{$user_salt}</td>";
			echo "<td><a href='users.php?unapprove='>unapprove</a></td>";
			echo "<td><a href='users.php?approve='>approve</a></td>";
			echo "<td><a href='users.php?delete='>delete</a></td>";
			echo "</tr>";
		}
	?>

	<?php
		// DELETE A COMMENT
		if(isset($_GET['delete'])) {
			$the_user_id = $_GET['delete'];
			$query = "DELETE FROM cms.comments WHERE cms.comments.user_id = {$the_user_id}";
			$delete_query = mysqli_query($dbConnection, $query);
			header("Location: comments.php");
		}
		// Approve a comment
		if(isset($_GET['approve'])) {
			$the_user_id = $_GET['approve'];
			$query = "UPDATE cms.comments SET cms.comments.user_role = 'Approved' WHERE cms.comments.user_id = {$the_user_id}";
			$approve_user_query = mysqli_query($dbConnection, $query);
			header("Location: comments.php");
		}
		// Unapprove a comment
		if(isset($_GET['unapprove'])) {
			$the_user_id = $_GET['unapprove'];
			$query = "UPDATE cms.comments SET cms.comments.user_role = 'Unapproved' WHERE cms.comments.user_id = {$the_user_id}";
			$unapprove_user_query = mysqli_query($dbConnection, $query);
			header("Location: comments.php");
		}
	?>
	</tbody>
</table>
