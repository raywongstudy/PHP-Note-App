<?php

class Note
{
	public function excerpt()
	{
		$content = strip_tags($this->content);
		$content = str_replace("\n", ' ', $content);
		$content = trim($content);

		if (mb_strlen($content, 'utf-8') <= 50)
		{
			return $content;
		}

		return mb_substr($content, 0, 50, 'utf-8') . '...';
	}
}