<?php
    $query = 'SELECT * FROM cms.posts';
    $select_posts = mysqli_query($dbConnection, $query);

    confirmQuery($select_posts);
?>
<table class="table table-hover table-bordered">
	<thead>
	<tr>
		<th>Id</th>
		<th>Author</th>
		<th>Title</th>
		<th>Category</th>
		<th>Status</th>
		<th>Image</th>
		<th>Date</th>
		<th>Content</th>
		<th>Tags</th>
		<th>Comments</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php
        // DELETE A POST
        if (isset($_GET['delete'])) {
            global $dbConnection;
            $the_post_id = $_GET['delete'];
            $query = "DELETE FROM cms.posts WHERE id = {$the_post_id}";
            $delete_query = mysqli_query($dbConnection, $query);
        }
    ?>
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

            echo '<tr>';
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
            echo "<td>{$post_category_id}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td><img src='../images/{$post_image}' width='100px'></td>";
            echo "<td>{$post_content}</td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><a href='./posts.php?source=edit_post&p_id={$post_id}'>edit</a></td>";
            echo "<td><a href='./posts.php?delete={$post_id}'>delete</a></td>";
            echo '</tr>';
        }
    ?>
	</tbody>
</table>
