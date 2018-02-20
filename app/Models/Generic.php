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
		$per_page = 3;
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = "";
		}

		if ($page == "" || $page === 1) {
			$page_1 = 0;
		} else {
			$page_1 = ($page * $per_page) - $per_page;
			var_dump($page_1);
		}

		$sql = "SELECT * FROM cms.posts WHERE cms.posts.post_status = 'Published' LIMIT $page_1, $per_page";
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

	// return number of posts by counting the number of rows
	function fetchPostCount()
	{
		$sql = "SELECT * FROM cms.posts";
		$find_count = mysqli_query($this->db, $sql);
		$count = mysqli_num_rows($find_count);
		$count = ceil($count / 5); // make int, not float
		return $count;
	}

	function pageNumberSetter()
	{
		// TODO
	}
}

