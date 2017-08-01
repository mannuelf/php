<?php

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
