<?php

require 'core/functions.php';

class NoteController
{
	public function index()
	{
		$notes = $database->fetchAll('notes');
		$the_note = $database->fetchOne('notes', [
			'id' => $_GET['id']
		]);

		require 'views/index.view.php';
	}

	public function create()
	{
		require 'views/create.view.php';
	}

	public function postCreate()
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

	public function edit()
	{
		$the_note = $database->fetchOne('notes', [
			'id' => $_GET['id']
		]);

		if (!$the_note)
		{
			header('Location: /');
			exit;
		}

		require 'views/edit.view.php';
	}

	public function postEdit()
	{
		$id = $_POST['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];

		if ($_POST['action'] == 'update')
		{
			$database->update('notes', [
				'title' => $title,
				'content' => $content
			], [
				'id' => $id
			]);

			header('Location: /?id=' . $id);
		} else if ($_POST['action'] == 'delete')
		{
			$database->delete('notes', [
				'id' => $id,
			]);

			header('Location: /');
		}

		exit;
	}

}