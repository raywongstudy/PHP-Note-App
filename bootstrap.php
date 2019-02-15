<?php

require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'Router.php';

$config = require 'config.php';

return new QueryBuilder(
	Connection::make($config['database'])
);