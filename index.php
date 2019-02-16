<?php

$database = require 'core/bootstrap.php';

Router::bind('/', 'NoteController@index');
Router::bind('/create', 'NoteController@create');
Router::bind('/edit', 'NoteController@edit');

Router::resolve($uri);