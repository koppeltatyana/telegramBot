<?php
function connectDB() {
	try {
		$dbh = new PDO('mysql:dbname=arashi5_bot;host=localhost', 'arashi5_bot', 'Qwe123456789');
		echo "DB has started!<br>";
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	
	return $dbh;
}



?>