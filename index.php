<?php

// require 'functions.php';

$database = require 'bootstrap.php';

$routes = [
	'' => 'controllers/index.php',
	'create' => 'controllers/create.php',
	'edit' => 'controllers/edit.php',
];

$uri = $_SERVER['REQUEST_URI'];
$uri = trim($uri, '/');

var_dump($routes[$uri]);

// $notes = $database->fetchAll('notes');

// $notes = getNotes();

// if (isset($_GET['id']))
// {
// 	$the_note = getNoteById($_GET['id']);
// }

// require 'views/index.view.php';