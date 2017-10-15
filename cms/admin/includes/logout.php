<?php session_start(); ?>
<?php
	// kill the current user session, by assigning the session variable to null
	$_SESSION['username'] = null;
	$_SESSION['firstname'] = null;
	$_SESSION['secondname'] = null;
	$_SESSION['user_role'] = null;

	// redirect user to the homepage
	header("Location: ../index.php");


