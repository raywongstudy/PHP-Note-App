<?php

require 'vendor/autoload.php'; // composer autoload
require 'bindings.php';
require 'routes.php';
require 'core/helpers.php';

Router::resolve($uri);