<?php include "functions.php" ?>
<?php include "includes/header.php" ?>
	<section class="content">

		<aside class="col-xs-4">
		<?php Navigation();?>


		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	<?php
	/*
	 * Step1: Use a pre-built math function here and echo it
	 * */
	echo pow(3,4);
	echo "<hr/>";
	/*
	 * Step 2:  Use a pre-built string function here and echo it
	 * */
	$newcastle = "Newcastle United";
	echo strtoupper($newcastle);
	echo "<hr/>";
	/*
	 * Step 3:  Use a pre-built Array function here and echo it
	 * */
	$numbers = [ 1982, 829, 928, 8272, 9272];
	echo max($numbers);
	echo "<hr/>";
	sort($numbers);
	print_r($numbers);
	?>

</article><!--MAIN CONTENT-->
<?php include "includes/footer.php" ?>
