<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$title = $_POST['title'];
	$content = $_POST['content'];

	$id = $database->insert('notes', [
		'title' => $title,
		'content' => $content,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s'),
	]);

	if (!is_null($id))
	{
		header('Location: /?id=' . $id);
		exit;
	} else {
		header('Location: /');
		exit;
	}
}

require 'views/create.view.php';