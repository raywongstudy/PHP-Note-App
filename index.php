<?php

require './functions.php';

$notes = getFiles('./notes');

print_r($notes);

require './views/index.view.php';