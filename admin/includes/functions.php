<?php

/**
 * Error notice for db query
 */
function confirmQuery($result) {
	global $dbConnection;

	if ( ! $result) {
		die("QUERY FAILED ." . mysqli_error($dbConnection));
	}
	return $result;
}

/**
 * Add a new category
 */
function insert_categories() {
	global $dbConnection;
	if(isset($_POST['submit'])) {
		$cat_title = $_POST['cat_title'];
		if ($cat_title == "" || empty($cat_title)) {
			echo "This field cannot be empty";
		} else {
			// construct query
			$query = "INSERT INTO cms.categories(cat_title) ";
			$query .= "VALUE('{$cat_title}') ";
			// submit to db
			$create_category_query = mysqli_query($dbConnection, $query);
			echo "SUCCESS you have added a new category";
			if (!$create_category_query) {
				die('Query Failed' . mysqli_error($dbConnection));
			}
		}
	}
}

/**
 * Find all categories
 */
function findAllCategories() {
	global $dbConnection;

	$query = "SELECT * FROM cms.categories";
	$select_categories = mysqli_query($dbConnection, $query);

	if (!$select_categories) {
		echo mysqli_error($select_categories);
	}

	while($row = mysqli_fetch_assoc($select_categories)) {
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		echo "<tr>";
		echo "<td>{$cat_id}</td>";
		echo "<td>{$cat_title}</td>";
		echo "<td><a href='categories.php?delete={$cat_id}'> <i class='fa fa-fw fa-remove'></i> </a></td>";
		echo "<td><a href='categories.php?edit={$cat_id}'> <i class='fa fa-fw fa-edit'></i> </a></td>";
		echo "</tr>";
	}
}

function deleteCategories() {
	global $dbConnection;

	if (isset($_GET['delete'])) {
		$the_cat_id = $_GET['delete'];
		$query = "DELETE FROM cms.categories WHERE cat_id = {$the_cat_id}";
		$delete_query = mysqli_query($dbConnection, $query);
		header("Location: categories.php");
	}
}
