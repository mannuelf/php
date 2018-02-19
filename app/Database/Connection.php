<?php
namespace App\Database;

class Connection
{
	public static $config = [
		'host' => '127.0.0.1',
		'user' => 'root',
		'pass' => 'root',
		'schema' => 'cms',
	];

	public static function connect()
	{
		$dbConnection = mysqli_connect(
			self::$config['host'],
			self::$config['user'],
			self::$config['pass'],
			self::$config['schema']
		);

		if (! $dbConnection) {
			die('Connection Error: '. mysqli_connect_error());
		}

		return $dbConnection;

	}
}
