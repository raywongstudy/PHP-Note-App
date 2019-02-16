<?php

namespace App\Database;

class Connection
{
	public static function make($db_config)
	{
		try {
			return new \PDO(
				$db_config['driver'] . ':' .
				'host=' . $db_config['db_host'] . ';' .
				'dbname=' . $db_config['db_name'] . ';' .
				'charset=' . $db_config['charset'],
				$db_config['db_user'],
				$db_config['db_pass']
			);
		} catch (Exception $e) {
			die( $e->getMessage() );
		}
	}
}