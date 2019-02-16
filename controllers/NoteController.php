<?php

namespace App\Controller;

class NoteController
{
	public function index()
	{
		$notes = \App::resolve('Note')->fetchAll('notes');

		$the_note = null;

		if (request('id'))
		{
			$the_note = \App::resolve('Note')->fetchOne('notes', [
				'id' => request('id')
			]);

			if (!$the_note)
			{
				throw new Exception(
					"Requested note could not be found"
				);
			}
		}

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

		$id = \App::resolve('Note')->insert('notes', [
			'title' => $title,
			'content' => $content,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);

		if (!is_null($id))
		{
			return redirect('/?id=' . $id);
		} else {
			throw new Exception(
				"Note could not be saved"
			);
		}
	}

	public function edit()
	{
		$the_note = \App::resolve('Note')->fetchOne('notes', [
			'id' => request('id')
		]);

		if (!$the_note)
		{
			throw new Exception(
				"Requested note could not be found"
			);
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
			\App::resolve('Note')->update('notes', [
				'title' => $title,
				'content' => $content
			], [
				'id' => $id
			]);

			return redirect('/?id=' . $id);
		} else if (request('action') == 'delete')
		{
			\App::resolve('Note')->delete('notes', [
				'id' => $id,
			]);

			return redirect('/');
		}

		throw new Exception(
			"Action is not valid"
		);
	}

}