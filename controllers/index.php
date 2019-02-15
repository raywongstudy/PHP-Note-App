<?php

require 'core/functions.php';

$notes = $database->fetchAll('notes');

require 'views/index.view.php';