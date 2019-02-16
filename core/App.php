<?php

class App
{
	static $bindings = [];

	public static function bind($key, $value)
	{
		self::$bindings[$key] = $value;
	}

	public static function resolve($key)
	{
		if (isset(self::$bindings[$key]))
		{
			return self::$bindings[$key];
		}

		throw new Exception(
			"Could not resolve {$key}"
		);
	}
}