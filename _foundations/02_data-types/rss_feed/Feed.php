<?php

class Feed {

	/**
	 * @var \ReadFile
	 */
	private $readfile;

	public function __construct(ReadFile $readfile)
	{
		$this->readfile = $readfile;
	}

	public function dumpRawXml()
	{
		$feed = $this->readfile->returnRawXmlFeed();
		var_dump($feed);
	}
}
