<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	echo 'This is a POST Request';
	exit;
}

require './views/create.view.php';