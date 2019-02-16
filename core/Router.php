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
		$uri = strtok($uri, '?');

		if (strlen($uri) > 1) {
			$uri = rtrim($uri, '/');
		}

		if (isset(self::$routes[$uri]))
		{
			return self::callAction(
				...explode('@', self::$routes[$uri])
			);
		}

		throw new Exception('404 Not Found');
	}

	protected static function callAction($controller, $method)
	{
		if (!method_exists($controller, $method))
		{
			throw new Exception(
				"{$controller} does not respond to method {$method}"
			);
		}

		return (new $controller)->$method();
	}

}