<?php

require './functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$id = $_POST['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];

	if ($_POST['action'] == 'update')
	{
		updateNote($id, $title, $content);

		header('Location: /index.php?id=' . $id);
	} else if ($_POST['action'] == 'delete')
	{
		deleteNote($id);
		header('Location: /index.php');
	}

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