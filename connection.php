<?php
$connection = new PDO("mysql:host=localhost; dbname=testlogin; charset=utf8;", 'root', '');//подключение к  бд не стал делать константы

//функция добавления комментария
function addComment($comment) {
	global $connection;
	$newComment = trim(strip_tags($comment));//принимаем коммент, фильтруем
	$connection->query("INSERT INTO `comments` (`comment`) VALUES ('$newComment');");//записываем комент в бд
	header("Location: " . $_SERVER['REQUEST_URI']); //обновляем страницу сбрасывая  массив пост
}

//функция удаления комментария
function delComment($delComment) { 
	global $connection;
	$del = $delComment;
	$connection->query("DELETE FROM comments WHERE id = $del");//удаляем коммент из бд
}

//функция возвращяет все комменты из бд
function getAllCommentsFromDB() { 
	global $connection;
	return $connection->query("SELECT * FROM comments ORDER BY comment DESC");
}

// функция авторизации пользователя
function signInUser($login, $pass) {
	global $connection;
	$login = trim(strip_tags($login));
	$pass = trim(strip_tags($pass));
	$users = $connection->query("SELECT * FROM `users` ");//получаем массив из бд с логинами и паролями
		foreach ($users as $user) {//проверяем совпадение введенных данных пользователя с данными из бд
			if ($user['login'] == $login && $user['password'] == $pass) {
				$_SESSION['login'] = $login; //создаем сессию
				header("location: content.php");//переадресуем
				return true;
			}
	}
}

//функция регистрация нового пользователя
function signUpNewUser ($login, $pass) {
	global $connection;
	$login = trim(strip_tags($login));
	$pass = trim(strip_tags($pass));
	$users = $connection->query("SELECT * FROM `users` ");//получаем массив из бд с логинами и паролями
			foreach ($users as $user) { //проверяем есть ли такой пользователь в бд
				if ($user['login'] == $login) {
					$out2 = 'Такой пользователь уже существует!';
				}
			}
			if (!$out2) {
				$connection->query("INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$pass')");//записываем нового юзера в бд
				//header("Location: " . $_SERVER['REQUEST_URI']); //обновляем страницу сбрасывая  массив пост, если это оставить $out2 не выводиться...
				$out2 = 'Регистрация завершина успешно!';
			}
			return $out2;
}

// ======================================
function delSession($session) { //пока это не работает потому что на странице content.php приходиться подключать другие файлы и они конфликтуют с header();
	unset($session);//удаляем сессию отменяя авторизацию
	header("Location: login.php");
}
?>

