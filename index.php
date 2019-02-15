<?php

require 'functions.php';

$notes = getNotes();

if (isset($_GET['id']))
{
	$the_note = getNoteById($notes, $_GET['id']);
}

require 'views/index.view.php';