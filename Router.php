<?php

class Router
{
	static $routes = [];

	public static function bind($uri, $file)
	{
		self::$routes[$uri] = $file;
	}

	public static function resolve($uri)
	{
		if (isset(self::$routes[$uri]))
		{
			return self::$routes[$uri];
		}

		throw new Exception('404 Not Found');
	}

}