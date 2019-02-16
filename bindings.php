<?php

use App\Database\QueryBuilder;
use App\Database\Connection;

App::bind('config', require 'core/config.php');

App::bind('database', new QueryBuilder(
	Connection::make(App::resolve('config')['database'])
));

App::bind('Note', App::resolve('database')->bindModel('App\\Model\\Note'));