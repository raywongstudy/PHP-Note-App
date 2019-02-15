<?php

require 'functions.php';

$notes = getNotes();

if (isset($_GET['id']))
{
	$the_note = getNoteById($_GET['id']);
}

require 'views/index.view.php';