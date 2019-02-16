<?php

require 'vendor/autoload.php'; // composer autoload
require 'bindings.php';
require 'routes.php';
require 'core/helpers.php';

try {
	App\Core\Router::resolve($uri);
} catch (Exception $e) {
	view('error', compact('e'));
}