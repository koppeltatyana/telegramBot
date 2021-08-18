<?php

function functionStart ($bot) {
	$bot->command('start', function($message) use($bot) {
		$answer = "Welcome";
		$bot->sendMessage($message->getChat()->getId(), $answer);
	});		
}

function functionGetHelp($bot) {
	$bot->command('help', function($message) use($bot) {
		$answer = "Команды:
		/help - помощь
		/getpict - показать котю
		/getbook - вывести книги";
		$bot->sendMessage($message->getChat()->getId(), $answer);
	});
}

function functionGetPicture($bot) {
	$bot->command('getpict', function($message) use($bot) {
		$pict = "https://pbs.twimg.com/media/EX-cofHWsAAl_H9.jpg";
		$bot->sendPhoto($message->getChat()->getId(), $pict);
	});	
}

function functionGetBook($bot) {
	$bot->command('getbook', function($message) use($bot) {
		$bookItem = new \CURLFile('books/1.txt');
		$bot->sendDocument($message->getChat()->getId(), $bookItem);
	});	
}

function showAllArrays($pdo) {
	
	$stmt = $pdo->query('SELECT * FROM Books');
	$data = $stmt->fetchAll();
	echo '<pre>';
	print_r($data);
	echo '<pre>';
}


function showAllBooks($pdo) {
	echo "<br><br>";
	$stmt = $pdo->query('SELECT * FROM Books');
	//$stmt->execute(array('1'));
	$data = $stmt->fetchAll();
	foreach ($data as $value) {
		$resStr = $value["bookName"] . "\n";
		echo $resStr;
	}
	return $resStr;
}

// function functionGetAllBooks($bot, $pdo) {
// 	$bot->command('getbooks', function($message) use($bot) {
// 		//$stmt = $pdo->query('SELECT * FROM `Books` LIMIT 10');
// 		$res = showAllBooks($pdo);
// 		echo "В переменную res записалось значение!" . "\n";
// 		$bot->sendMessage($message->getChat()->getId(), $res);
// 	});	
// }


