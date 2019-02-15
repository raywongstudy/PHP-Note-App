<?php

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

$the_note = $database->fetchOne('notes', [
	'id' => $_GET['id']
]);

if (!$the_note)
{
	header('Location: /');
	exit;
}

require 'views/edit.view.php';