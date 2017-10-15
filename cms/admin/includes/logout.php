<?php session_start(); ?>
<?php
	// kill the current user session
	$_SESSION['username'] = null;
	$_SESSION['firstname'] = null;
	$_SESSION['secondname'] = null;
	$_SESSION['user_role'] = null;

	header("Location: ../index.php");
