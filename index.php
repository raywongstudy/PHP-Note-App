<?php

require 'core/bootstrap.php';

Router::bind('/', 'controllers/index.php');
Router::bind('/create', 'controllers/create.php');
Router::bind('/edit', 'controllers/edit.php');

require Router::resolve($uri);