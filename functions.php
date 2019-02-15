<?php

function getFiles($path)
{
	return array_diff(scandir($path), array('.', '..'));
}

