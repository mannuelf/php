<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

	<aside class="col-xs-4">

		<?php Navigation();?>


	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	<?php
	/*
		Step1: Define a function and make it return a calculation of 2 numbers
	*/

	function addNumbers() {
		echo 400 + 400;
	}

	addNumbers();

	echo "<br/>";

	/*
		Step 2: Make a function that passes parameters and call it using
		parameter values
	*/

	function calculate($number1, $number2) {
		$sum = $number1 * $number2;
		echo $sum;
	}

	calculate(100,11);

?>





</article><!--MAIN CONTENT-->


<?php include "includes/footer.php" ?>
