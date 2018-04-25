<?php
	
	define('DB_HOST', '127.0.0.1');
	define('DB_NAME', 'yourclients');
	define('DB_USER', 'homestead'); // change to cproot when live
	define('DB_PASS', 'secret');

	$dbc = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);