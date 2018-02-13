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

	/**
	 * return array
	 */
	function fetchPosts()
	{
		$sql = "SELECT * FROM cms.posts WHERE cms.posts.post_status = 'Published' ";
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
}

