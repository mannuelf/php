<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>

	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php

/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP

	Step 2: Make a forloop  that displays 10 numbers

	Step 3 : Make a switch Statement that test againts one condition with 5 cases
 */
	if(10 > 0) {
		echo "I think php is great";
	} elseif(0 < 10) {
		echo "I love PHP";
	} else {
		echo "Maybe here";
	}

	echo "<br/>";

	for($counter = 0; $counter <= 10; $counter++) {
		echo $counter . ', ';
	}

	echo "<br/>";

	$number = 5;
	switch($number) {
		case 1:
		echo "One";
		break;

		case 2:
		echo "two";
		break;

		case 3:
		echo "three";
		break;

		case 4:
		echo "four";
		break;

		case 5:
		echo "five";
		break;

		default :
		echo "soz could not find anything";
	}


?>






</article><!--MAIN CONTENT-->

<?php include "includes/footer.php" ?>
