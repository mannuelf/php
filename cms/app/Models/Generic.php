<?php
namespace App\Models;

use App\Database\Connection;

class Generic
{
	// static functions for each query
	static function fetchPosts()
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM cms.posts WHERE cms.posts.post_status = 'Published' LIMIT 5, 5";
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

	// return number of posts by counting the number of rows
	static function fetchPostCount()
	{
		$db = Connection::connect();
		$sql = "SELECT * FROM cms.posts";
		$find_count = mysqli_query($db, $sql);
		$count = mysqli_num_rows($find_count);
		$count = ceil($count / 5);
		return $count;
	}
}

