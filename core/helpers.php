<?php

function view($file, $vars = [])
{
	$path = __DIR__ . '/../views/' . $file . '.view.php';

	if (!file_exists($path))
	{
		throw new Exception(
			"view {$file} could not be found"
		);
	}

	extract($vars);

	require $path;
}

function redirect($to)
{
	header('Location: ' . $to);
	exit;
}