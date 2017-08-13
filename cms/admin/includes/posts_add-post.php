<?php
    if (isset($_POST['add_post'])) {
        global $dbConnection;

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

        // move image to images folder
        move_uploaded_file($post_image_temp, "../images/{$post_image}");

        $query = 'INSERT INTO cms.posts(
			post_title,
			post_author,
			post_date,
			post_image,
			post_content,
			post_tags,
			post_comment_count,
			post_status)';

        $query .= "VALUES(
			'{$post_title}',
			'{$post_author}', 
			  now(),
			'{$post_image}',
			'{$post_content}',
			'{$post_tags}',
			'{$post_comment_count}',
			'{$post_status}' ) ";

        $create_post_query = mysqli_query($dbConnection, $query);

        confirmQuery($create_post_query);
    }
