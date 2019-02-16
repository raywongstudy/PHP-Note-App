<?php

require 'vendor/autoload.php'; // composer autoload

$config = require 'config.php';

return new QueryBuilder(
	Connection::make($config['database'])
);