<?php

try {
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=note_app;charset=utf8mb4', 'note_app', 'dbpass');
} catch (Exception $e) {
	die( $e->getMessage() );
}
