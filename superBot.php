<?php
header('Content-Type: text/html; charset=utf-8');
// подключаем API
require_once("vendor/autoload.php");

//подключаем db
require_once("db_connect.php");
require("botFunctions.php");


//create bot value
$token = "token";
$bot = new \TelegramBot\Api\Client($token);
$pdo = connectDB(); // переменная при подключении к БД, будет нужна, когда будут запросы

//если бот еще не зарегистрирован - регистрируем
if (!file_exists("registered.trigger")) {
	/*файл registered.trigger будет создаваться после регистрации бота
	 *файла нет - бот не зарегистрирован
	*/
	// урл текущей страницы
	$page_url = "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$result = $bot->setWebhook($page_url);
	
	if($result) {
		file_put_contents("registered.trigger", time()); //создаем файл
	}
}


// запуск бота (функция /start)
functionStart($bot);
// функция /help
functionGetHelp($bot);

functionGetPicture($bot);

functionGetBook($bot);

showAllArrays($pdo);

showAllBooks($pdo);

//functionGetAllBooks($bot, $pdo);

if(!empty($bot->getRawBody())) {
	$bot->run();
}


?>
