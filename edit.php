<?php

require './functions.php';

$notes = getNotes();
$the_note = getNoteById($notes, $_GET['id']);

if (!$the_note)
{
	header('Location: /index.php');
	exit;
}

require './views/edit.view.php';