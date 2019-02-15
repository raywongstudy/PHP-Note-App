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

function getNotes($path = null)
{
	if (is_null($path))
	{
		$path = __DIR__ . '/notes';
	}

	$filenames = getFiles($path);

	$results = [];

	foreach ($filenames as $filename)
	{
		$filepath = $path . '/' . $filename;

		if (!file_exists($filepath))
		{
			continue;
		}

		$file_content = file_get_contents($filepath);
		$rows = explode("\n", $file_content);

		if (count($rows) < 2)
		{
			// Note should be corrupted
			continue;
		}

		$title = $rows[0];

		unset($rows[0]);
		$content = join("\n", $rows);

		array_push($results, [
			'title' => $title,
			'content' => $content,
		]);
	}

	return $results;
}