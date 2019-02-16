<?php

namespace App\Core;

class Router
{
	static $routes = [
		'GET' => [],
		'POST' => [],
	];

	public static function get($uri, $controller)
	{
		self::$routes['GET'][$uri] = $controller;
	}

	public static function post($uri, $controller)
	{
		self::$routes['POST'][$uri] = $controller;
	}

	public static function resolve()
	{
		$uri = $_SERVER['REQUEST_URI'];
		$uri = strtok($uri, '?');

		if (strlen($uri) > 1) {
			$uri = rtrim($uri, '/');
		}

		if (isset(self::$routes[$_SERVER['REQUEST_METHOD']][$uri]))
		{
			return self::callAction(
				...explode('@', self::$routes[$_SERVER['REQUEST_METHOD']][$uri])
			);
		}

		throw new \Exception('404 Not Found');
	}

	protected static function callAction($controller, $method)
	{
		$controller = '\\App\\Controller\\' . $controller;

		if (!method_exists($controller, $method))
		{
			throw new \Exception(
				"{$controller} does not respond to method {$method}"
			);
		}

		return (new $controller)->$method();
	}

}