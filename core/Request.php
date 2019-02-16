<?php

class Request
{
	public static function is($type)
	{
		if (strtoupper($_SERVER['REQUEST_METHOD']) === strtoupper($type))
		{
			return true;
		}

		return false;
	}

	public static function get($name, $default = null)
	{
		if (isset($_REQUEST[$name]) && $_REQUEST[$name] != '')
		{
			return $_REQUEST[$name];
		}

		return $default;
	}
}