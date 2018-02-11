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
}

