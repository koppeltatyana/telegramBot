<?php

function connectDB() {
	$host = 'localhost';
	$database = 'arashi5_bot';
	$user = 'arashi5_bot';
	$pass = 'Qwe123456789';
	try {
		$dsn = "mysql:host=$host;dbname=$database;";
		$options = array(
	    	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		$pdo = new PDO($dsn, $user, $pass, $options);
		echo "БД подключена <br>";
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	
	return $pdo;
}



?>
