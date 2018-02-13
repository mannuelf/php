<?php
namespace App\Models;

use App\Database\Connection;

class Generic
{
	// static functions for each query
	static function fetchPosts()
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM cms.posts WHERE cms.posts.post_status = 'Published' ";
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


	static function fetchCategories()
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM cms.categories ORDER BY cms.categories.cat_title";
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
		$sql = "SELECT * FROM cms.posts WHERE post_tags LIKE '%{$search}%'";
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
		$sql = "SELECT * FROM cms.posts WHERE cms.posts.id = {$id}";
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
		$sql = "UPDATE cms.posts SET cms.posts.post_views_count = cms.posts.post_views_count + 1 WHERE cms.posts.id = {$id}";
		$query = mysqli_query($db, $sql);

		if ( ! $query) {
			echo mysqli_error($query);
		}
	}

	static function saveComment($data)
	{
		/*
		$comment_query = "INSERT INTO cms.comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
		$comment_query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";
		*/

		$sql = 'INSERT INTO cms.comments (
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

