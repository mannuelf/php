<?php namespace Tests;

abstract class TestCase
{
	private $db;

	function setUp()
	{
		require_once '../app/bootstrap/start.php';
		$this->db = $db;
	}

	function tearDown()
	{
		unset($this->db);
	}
}
