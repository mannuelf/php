<?php

class Feed extends ReadFile {

	function convertRssToXML()
	{
		$feed = $this->openFile();
		$xml = simplexml_import_dom($feed);
		$xmlArray = [];
		$json = json_encode($xml);
		$array = json_decode($json, TRUE);
		var_dump($feed);
		var_dump($array);
	}
}
