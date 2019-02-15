<?php

$database = require 'bootstrap.php';

require 'Router.php';

Router::bind('/', 'controllers/index.php');
Router::bind('/create', 'controllers/create.php');
Router::bind('/edit', 'controllers/edit.php');

require Router::resolve($uri);