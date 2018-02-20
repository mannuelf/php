<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

		<aside class="col-xs-4">

	<?php Navigation();?>


		</aside><!--SIDEBAR-->


		<article class="main-content col-xs-8">



		<?php

		/* Step 1: Make 2 variables called number1 and number2 and set 1 to value 10 and the other 20:

		  Step 2: Add the two variables and display the sum with echo:

		  Step3: Make 2 Arrays with the same values, one regular and the other associative

		  Step4: Make a constant and set it to the value of PHP. and use an echo to print it out
		*/

		$number1 = 1;
		$number2 = 10;

		echo $number1 + $number2;

		echo "<hr/>";

		$numbers1 = array(1, 10);

		$numbers = array(
			"number1" => 1,
			"number2" => 10,
		);

		echo $number1[0] . $numbers1[1];

		echo "<hr/>";

		echo $numbers["number1"] . $numbers["number2"];

		echo "<hr/>";

		define("PHP", "PHP Is Pretty Awesome");
		echo PHP;

		?>

		</article><!--MAIN CONTENT-->

<?php include "includes/footer.php" ?>
