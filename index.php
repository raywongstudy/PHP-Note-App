<?php

require 'vendor/autoload.php'; // composer autoload
require 'bindings.php';
require 'routes.php';

Router::resolve($uri);