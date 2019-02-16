<?php

require 'vendor/autoload.php'; // composer autoload

App::bind('config', require 'core/config.php');

App::bind('database', new QueryBuilder(
	Connection::make(App::resolve('config')['database'])
));

require 'routes.php';

Router::resolve($uri);