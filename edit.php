<?php

require './functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$id = $_POST['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	
	updateNote($id, $title, $content);

	header('Location: /index.php?id=' . $id);

	exit;
}

$notes = getNotes();
$the_note = getNoteById($notes, $_GET['id']);

if (!$the_note)
{
	header('Location: /index.php');
	exit;
}

require './views/edit.view.php';