<?php

function getFiles($path)
{
	return array_diff(scandir($path), array('.', '..'));
}

function saveNote($filename, $title, $content)
{
	$filepath = __DIR__ . '/notes/' . $filename;
	$data = $title . "\n" . $content;

	file_put_contents($filepath, $data, LOCK_EX);
}