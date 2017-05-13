<?php include "functions.php" ?>
<?php include "includes/header.php" ?>


<section class="content">

	<aside class="col-xs-4">

		<?php Navigation(); ?>


	</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">


		<?php

		/*  Create a link saying Click Here, and set
        the link href to pass some parameters and use the GET super global to see it

            Step 2 - Set a cookie that expires in one week

            Step 3 - Start a session and set it to value, any value you want.
        */
		$user = "Hello Manny";
		$cookieName = "PHPLESSON9";
		$cookieValue = 120912;
		$cookieExpiration = time() + (60 * 60 * 24 * 7);
		setcookie($cookieName, $cookieValue, $cookieExpiration);
		session_start();
		$_SESSION['NEWUSER'] = $user;
		?>
		<a href="./9.php?id='897987987'">CLICK HERE</a>
		<br>
		<?php
			if(isset($_COOKIE['PHPLESSON9'])) {
				echo $_COOKIE['PHPLESSON9'] . "<br>";
			}

			if(isset($_SESSION['NEWUSER'])) {
				echo $_SESSION['NEWUSER'];
			}
		?>


	</article><!--MAIN CONTENT-->
	<?php include "includes/footer.php" ?>
