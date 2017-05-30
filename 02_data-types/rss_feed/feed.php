<?php
	$feed = 'https://codeascraft.com/feed/atom/';
	$xml = simplexml_import_dom($feed);
	$json = json_encode($xml);
	$array = json_decode($json, TRUE);
	var_dump($feed);
	var_dump($array);
