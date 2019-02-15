<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$title = $_POST['title'];
	$content = $_POST['content'];

	var_dump($title, $content);

	exit;
}

require './views/create.view.php';