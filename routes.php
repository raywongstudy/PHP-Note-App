<?php

use App\Core\Router;

Router::get('/', 'NoteController@index');

Router::get('/create', 'NoteController@create');
Router::post('/create', 'NoteController@postCreate');

Router::get('/edit', 'NoteController@edit');
Router::post('/edit', 'NoteController@postEdit');