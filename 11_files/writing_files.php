
<?php

$file = "logs.txt";
if($handle = fopen($file, 'w')) {
	fwrite($handle, "I love php");
	fclose($handle);
} else {
	echo 'files could not be written too';
}


