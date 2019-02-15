<?php

require './functions.php';

$notes = getNotes();
print_r($notes);

require './views/index.view.php';