<?php
header('Content-Type: text/html; charset=utf-8');
// подключаем API
require_once("vendor/autoload.php");

//подключаем db
require_once("db_connect.php");

//выводим все книги
require_once("selectBooks.php");


//create bot value
$token = "1906948976:AAFnfC_VyFRjaORv8-x78mb7AKyqZlZtWV4";
$bot = new \TelegramBot\Api\Client($token);
$bdConnect = connectDB();

//если бот еще не зарегистрирован - регистрируем
if (!file_exists("registered.trigger")) {
	/*
	 * файл registered.trigger будет создаваться после регистрации бота
	 * файла нет - бот не зарегистрирован
	*/
	
	// урл текущей страницы
	$page_url = "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$result = $bot->setWebhook($page_url);
	
	if($result) {
		file_put_contents("registered.trigger", time()); //создаем файл
	}
}


// запуск бота (функция /start)
$bot->command('start', function($message) use($bot) {
	$answer = "Welcome";
	$bot->sendMessage($message->getChat()->getId(), $answer);
});


// функция /help
$bot->command('help', function($message) use($bot) {
	$answer = "Команды:
	/help - помощь
	/getpict - показать котю
	/getbooks - вывести книги";
	$bot->sendMessage($message->getChat()->getId(), $answer);
});

$bot->command('getpict', function($message) use($bot) {
	$pict = "https://pbs.twimg.com/media/EX-cofHWsAAl_H9.jpg";
	$bot->sendPhoto($message->getChat()->getId(), $pict);
});

// функция 
$bot->command('getBooks', function($message) use($bot) {
	$books = selectBooks($dbh);
	$bot->sendMessage($message->getChat()->getId(), $books);
});


if(!empty($bot->getRawBody())) {
	$bot->run();
}






?>