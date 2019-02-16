<?php

class NoteController
{
	public function index()
	{
		$notes = App::resolve('Note')->fetchAll('notes');
		$the_note = App::resolve('Note')->fetchOne('notes', [
			'id' => request('id')
		]);

		return view('index', compact('notes', 'the_note'));
	}

	public function create()
	{
		return view('create');
	}

	public function postCreate()
	{
		$title = request('title', 'No Title');
		$content = request('content');

		$id = App::resolve('Note')->insert('notes', [
			'title' => $title,
			'content' => $content,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);

		if (!is_null($id))
		{
			return redirect('/?id=' . $id);
		} else {
			return redirect('/');
		}
	}

	public function edit()
	{
		$the_note = App::resolve('Note')->fetchOne('notes', [
			'id' => request('id')
		]);

		if (!$the_note)
		{
			return redirect('/');
		}

		return view('edit', compact('the_note'));
	}

	public function postEdit()
	{
		$id = request('id');
		$title = request('title', 'No Title');
		$content = request('content');

		if (request('action') == 'update')
		{
			App::resolve('Note')->update('notes', [
				'title' => $title,
				'content' => $content
			], [
				'id' => $id
			]);

			return redirect('/?id=' . $id);
		} else if (request('action') == 'delete')
		{
			App::resolve('Note')->delete('notes', [
				'id' => $id,
			]);

			return redirect('/');
		}

		exit;
	}

}