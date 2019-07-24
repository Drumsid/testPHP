<?php
$connection = new PDO("mysql:host=localhost; dbname=testlogin; charset=utf8;", 'root', '');//подключение к  бд не стал делать константы

function addComment($comment) {//функция добавления комментария
	global $connection;
	$newComment = trim(strip_tags($comment));//принимаем коммент, фильтруем
	$connection->query("INSERT INTO `comments` (`comment`) VALUES ('$newComment');");//записываем комент в бд
	header("Location: " . $_SERVER['REQUEST_URI']); //обновляем страницу сбрасывая  массив пост
}

function delComment($delComment) { //функция удаления комментария
	global $connection;
	$del = $delComment;
	$connection->query("DELETE FROM comments WHERE id = $del");//удаляем коммент из бд
}

function getAllCommentsFromDB() { //функция возвращяет все комменты из бд
	global $connection;
	return $connection->query("SELECT * FROM comments ORDER BY comment DESC");
}

function signInUser($login, $pass) {// функция авторизации пользователя
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
?>

