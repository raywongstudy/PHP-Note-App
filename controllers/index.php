<?php

require 'core/functions.php';

$notes = $database->fetchAll('notes');
$the_note = $database->fetchOne('notes', [
	'id' => $_GET['id']
]);

require 'views/index.view.php';