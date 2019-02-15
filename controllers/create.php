<?php

die('create');

require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$title = $_POST['title'];
	$content = $_POST['content'];

	$id = saveNote($title, $content);

	if (!is_null($id))
	{
		header('Location: /index.php?id=' . $id);
		exit;
	} else {
		header('Location: /index.php');
		exit;
	}
}

require 'views/create.view.php';