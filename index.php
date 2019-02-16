<?php

require 'vendor/autoload.php'; // composer autoload

$config = require 'core/config.php';

App::bind('database', new QueryBuilder(
	Connection::make($config['database'])
));

Router::get('/', 'NoteController@index');

Router::get('/create', 'NoteController@create');
Router::post('/create', 'NoteController@postCreate');

Router::get('/edit', 'NoteController@edit');
Router::post('/edit', 'NoteController@postEdit');

Router::resolve($uri);