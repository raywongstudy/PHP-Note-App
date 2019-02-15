<?php

require 'functions.php';

require 'database/Connection.php';
require 'database/QueryBuilder.php';

$pdo = Connection::make();
$query = new QueryBuilder($pdo);
$notes = $query->fetchAll('notes');

print_r($notes);
exit;

$notes = getNotes();

if (isset($_GET['id']))
{
	$the_note = getNoteById($_GET['id']);
}

require 'views/index.view.php';