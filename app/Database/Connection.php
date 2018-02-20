<?php
namespace App\Database;

class Connection
{
	private $config = [];

	/**
	 * array $config
	 */
	function __construct($config)
	{
		$this->config = $config;
	}

	/**
	 * returns mysqli_connect
	 */
	function connect()
	{
		$dbConnection = mysqli_connect(
			$this->config['host'],
			$this->config['user'],
			$this->config['pass'],
			$this->config['schema']
		);

		if (! $dbConnection) {
			die('Connection Error: '. mysqli_connect_error());
		}

		return $dbConnection;
	}
}
