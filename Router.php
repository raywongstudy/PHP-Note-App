<?php

class Router
{
	static $routes = [];

	public static function bind($uri, $file)
	{
		self::$routes[$uri] = $file;
	}

	public static function resolve()
	{
		$uri = $_SERVER['REQUEST_URI'];

		if (strlen($uri) > 1) {
			$uri = rtrim($uri, '/');
		}

		if (isset(self::$routes[$uri]))
		{
			return self::$routes[$uri];
		}

		throw new Exception('404 Not Found');
	}

}