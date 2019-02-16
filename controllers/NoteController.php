<?php

class NoteController
{
	public function index()
	{
		$notes = App::resolve('Note')->fetchAll('notes');
		$the_note = App::resolve('Note')->fetchOne('notes', [
			'id' => $_GET['id']
		]);

		return view('index', compact('notes', 'the_note'));
	}

	public function create()
	{
		require 'views/create.view.php';
	}

	public function postCreate()
	{
		$title = $_POST['title'];
		$content = $_POST['content'];

		$id = App::resolve('Note')->insert('notes', [
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
		$the_note = App::resolve('Note')->fetchOne('notes', [
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
			App::resolve('Note')->update('notes', [
				'title' => $title,
				'content' => $content
			], [
				'id' => $id
			]);

			header('Location: /?id=' . $id);
		} else if ($_POST['action'] == 'delete')
		{
			App::resolve('Note')->delete('notes', [
				'id' => $id,
			]);

			header('Location: /');
		}

		exit;
	}

}