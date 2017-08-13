<?php
    $query = 'SELECT * FROM cms.posts';
    $select_posts = mysqli_query($dbConnection, $query);
?>
<table class="table table-hover table-bordered">
	<thead>
	<tr>
		<th>Id</th>
		<th>Cat Id</th>
		<th>Title</th>
		<th>Author</th>
		<th>Date</th>
		<th>Image</th>
		<th>Content</th>
		<th>Tags</th>
		<th>Comments</th>
		<th>Status</th>
		<th>Date</th>
		<th>Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php
        // DELETE A POST
        if (isset($_GET['delete'])) {
            global $dbConnection;
            $the_post_id = $_GET['delete'];
            $query = "DELETE FROM cms.posts WHERE id = {$the_post_id} ";
            $delete_query = mysqli_query($dbConnection, $query);
        }
    ?>
	<?php
        while ($row = mysqli_fetch_assoc($select_posts)) {
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
            echo '<tr>';
            echo "<td>{$post_id}</td>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><img src='../images/{$post_image}' width='100px'></td>";
            echo "<td>{$post_content}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><a href='./posts.php?delete={$post_id}'>delete</a></td>";
            echo '</tr>';
        }
    ?>
	</tbody>
</table>
