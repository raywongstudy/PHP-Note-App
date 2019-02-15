<?php

require 'database.php';

function saveNote($title, $content)
{
	global $pdo;

	$stmt = $pdo->prepare('INSERT INTO notes (title, content, created_at, updated_at) VALUES (?, ?, ?, ?)');
	
	$stmt->execute([
		$title,
		$content,
		date('Y-m-d H:i:s'),
		date('Y-m-d H:i:s'),
	]);

	return $pdo->lastInsertId();
}

function updateNote($id, $title, $content)
{
	global $pdo;

	$stmt = $pdo->prepare('UPDATE notes SET title = ?, content = ? WHERE id = ?');
	$stmt->execute([$title, $content, $id]);

	return $pdo->lastInsertId();
}

function deleteNote($id)
{
	$filename = $id . '.txt';

	if (isValidFilename($filename))
	{
		$filepath = __DIR__ . '/notes/' . $filename;

		if (file_exists($filepath))
		{
			@unlink($filepath);
		}
	}
}

function getNotes($path = null)
{
	global $pdo;

	$stmt = $pdo->query('SELECT * FROM notes');

	$notes = $stmt->fetchAll(PDO::FETCH_OBJ);

	$results = [];

	foreach ($notes as $note)
	{
		array_push($results, [
			'id' => $note->id,
			'title' => $note->title,
			'content' => $note->content,
			'updated_at' => $note->updated_at,
		]);
	}

	return $results;
}

function excerpt($content)
{
	$content = strip_tags($content);
	$content = str_replace("\n", ' ', $content);
	$content = trim($content);

	if (mb_strlen($content, 'utf-8') <= 50)
	{
		return $content;
	}

	return mb_substr($content, 0, 50, 'utf-8') . '...';
}

function getNoteById($notes, $id)
{
	$key = array_search($id, array_column($notes, 'id'));

	if ($key === false) {
		return null;
	}

	return $notes[$key];
}