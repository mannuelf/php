<?php

class ReadFile {

	public function openFile()
	{
		$file = 'codeascraft.xml';
		if($fileHandle = fopen($file, r)) {
			$feed = fread($fileHandle, filesize($file));
			fclose($fileHandle);
		} else {
			echo "error file could not be loaded.";
		}
		var_dump($feed);
		return $feed;
	}
}

if(method_exists("ReadFile", "openFile")) {
	echo "The Method Exists";
} else {
	echo "It does not";
}
$readFile = new ReadFile();
