<?php
namespace App\Models;

use App\Database\Connection;

class Generic
{
	// Login
	static function userLogin($username)
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM users WHERE users.user_name = '{$username}'";
		$query = mysqli_query($db, $sql);
		if ( ! $query) {
			echo mysqli_error($query);
		}
		$user = [];
		while ($row = mysqli_fetch_array($query)) {
			$user[] = $row;
		}

		return $user;
	}

	// static functions for each query
	static function fetchPosts()
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM posts WHERE posts.post_status = 'Published' ";
		$query = mysqli_query($db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$result = [];
		while ($row = mysqli_fetch_assoc($query)) {
			$result[] = $row;
		}

		return $result;
	}

	static function fetchPostsByUser($the_post_author_id)
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM posts WHERE post_author = '{$the_post_author_id}' ";
		$query = mysqli_query($db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$row = mysqli_fetch_assoc($query);

		return $row;
	}


	static function fetchCategories()
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM categories ORDER BY categories.cat_title";
		$query = mysqli_query($db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$result = [];
		while ($row = mysqli_fetch_assoc($query)) {
			$result[] = $row;
		}

		return $result;
	}

	static function fetchSearchResults($search)
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM posts WHERE post_tags LIKE '%{$search}%'";
		$query = mysqli_query($db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$result = [];
		while ($row = mysqli_fetch_assoc($query)) {
			$result[] = $row;
		}

		return $result;
	}

	static function fetchPost($id)
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM posts WHERE posts.id = {$id}";
		$query = mysqli_query($db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$row = mysqli_fetch_assoc($query);

		return $row;
	}

	static function fetchPostCount()
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM posts";
		$query = mysqli_query($db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$row = mysqli_fetch_assoc($query);

		return $row;
	}

	static function updatePostCounter($id)
	{
		$db = Connection::connect();
		$sql = "UPDATE posts SET posts.post_views_count = posts.post_views_count + 1 WHERE posts.id = {$id}";
		$query = mysqli_query($db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}
	}

	static function saveComment($data)
	{
		/*
		$comment_query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
		$comment_query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";
		*/

		$sql = 'INSERT INTO comments (
					comment_post_id,
					comment_author,
					comment_email,
					comment_content,
					comment_status,
					comment_date
				) VALUES (
					%d,
					"%s",
					"%s",
					"%s",
					%s,
					%d
				)';

		$sql = sprintf(
			$sql,
			$data['the_post_id'],
			$data['comment_author'],
			$data['comment_email'],
			$data['comment_content'],
			'unapproved',
			time()
		);

	}



}

