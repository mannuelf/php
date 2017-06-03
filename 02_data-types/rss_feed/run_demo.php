<?php

require_once 'ReadFile.php';
require_once 'Feed.php';

$readFile = new ReadFile('codeascraft.xml');

$feed = new Feed($readFile);
$feed->dumpRawXml();
