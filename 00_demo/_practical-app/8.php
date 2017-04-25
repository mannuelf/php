<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

	<aside class="col-xs-4">

		<?php Navigation(); ?>


	</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">


		<?php

		/*  Step 1 -Make a variable with some text as value

            Step 2 - Use crypt() function to encrypt it

            Step 3 - Assign the crypt result to a variable

            Step 4 - echo the variable

        */
		$myVariable = "osidhfiuewhbkjvnkdnj";
		$hashFormat = "$2y$10$";
		$salt = "987yhjkmcfd53twydgfvgt";
		$hashFormatSalt = $hashFormat . $salt;

		$password = crypt($myVariable, $hashFormatSalt);
		echo $password;

		?>


	</article><!--MAIN CONTENT-->
<?php include "includes/footer.php" ?>
