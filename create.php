<?php

require './functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$title = $_POST['title'];
	$content = $_POST['content'];

	$filename = time() . '.txt';
	
	saveNote($filename, $title, $content);

	header('Location: /index.php');

	exit;
}

require './views/create.view.php';