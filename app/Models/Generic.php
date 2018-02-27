<?php
namespace App\Models;

use App\Database\Connection;

class Generic
{
	private $db;

	/**
	 * $db
	 */
	function __construct($db)
	{
		$this->db = $db;
	}

	// static functions for each query
	function fetchPosts()
	{
		$sql = "SELECT * FROM posts WHERE posts.post_status = 'Published' ";
		$query = mysqli_query($this->db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$result = [];
		while ($row = mysqli_fetch_assoc($query)) {
			$result[] = $row;
		}

		return $result;
	}


	function fetchCategories()
	{
		$sql = "SELECT * FROM categories ORDER BY categories.cat_title";
		$query = mysqli_query($this->db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$result = [];
		while ($row = mysqli_fetch_assoc($query)) {
			$result[] = $row;
		}

		return $result;
	}

	function fetchSearchResults($search)
	{
		$sql = "SELECT * FROM posts WHERE post_tags LIKE '%{$search}%'";
		$query = mysqli_query($this->db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$result = [];
		while ($row = mysqli_fetch_assoc($query)) {
			$result[] = $row;
		}

		return $result;
	}

	function fetchPost($id)
	{
		$sql = "SELECT * FROM posts WHERE posts.id = {$id}";
		$query = mysqli_query($this->db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$row = mysqli_fetch_assoc($query);

		return $row;
	}

	function fetchPostCount()
	{
		$sql = "SELECT count(id) AS total_posts FROM posts WHERE posts.post_status = 'Published' ";
		$query = mysqli_query($this->db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}

		$row = mysqli_fetch_assoc($query);

		return (int)$row['total_posts'];
	}

	function updatePostCounter($id)
	{
		$sql = "UPDATE posts SET posts.post_views_count = posts.post_views_count + 1 WHERE posts.id = {$id}";
		$query = mysqli_query($this->db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}
	}

	function saveComment($data)
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
