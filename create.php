<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$title = $_POST['title'];
	$content = $_POST['content'];

	$filename = time() . '.txt';
	$filepath = './notes/' . $filename;

	$content = $title . "\n" . $content;

	file_put_contents($filepath, $content, LOCK_EX);

	header('Location: /index.php');

	exit;
}

require './views/create.view.php';