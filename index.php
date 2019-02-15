<?php

require 'functions.php';

$database = require 'bootstrap.php';

$notes = $database->fetchAll('notes');

print_r($notes);
exit;

$notes = getNotes();

if (isset($_GET['id']))
{
	$the_note = getNoteById($_GET['id']);
}

require 'views/index.view.php';