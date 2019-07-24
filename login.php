<?php
session_start();
ob_start(); // пока без этой строчки вылезает ошибка Cannot modify header information как решить это иначе я пока не знаю.
require_once 'connection.php';

//авторизуемся на сайте
if ($_POST['submit']) {
	if (!signInUser($_POST['login'], $_POST['password'])) {
		$out = 'Неправельный логин или пароль!';
	}

}

//регистрируемся на сайте
if ($_POST['registr']) {
			$users = $connection->query("SELECT * FROM `users` ");//получаем массив из бд с логинами и паролями
			foreach ($users as $user) { //проверяем есть ли такой пользователь в бд
				if ($user['login'] == $_POST['regLogin']) {
					$out2 = 'Такой пользователь уже существует!';
				}
			}
			if (!$out2) {
				$regLogin = $_POST['regLogin'];
				$regPassword = $_POST['regPassword'];
				$connection->query("INSERT INTO `users` (`login`, `password`) VALUES ('$regLogin', '$regPassword')");//записываем нового юзера в бд
				//header("Location: " . $_SERVER['REQUEST_URI']); //обновляем страницу сбрасывая  массив пост
				$out2 = 'Регистрация завершина успешно!';
			}
			
}

	require_once 'header.php';
?>
<p>Форма авторизации.</p>
<?= $out; ?>
<div class="wrap-form">
	<form action="" method="post">
		<input type="text" name="login" required>
		<input type="text" name = "password" required>
		<input type="submit" name="submit">
	</form>
</div>
<p>Форма регистрации.</p>
<?= $out2; ?>
<div class="wrap-form">
	<form action="" method="post">
		<input type="text" name="regLogin" required>
		<input type="text" name = "regPassword" required>
		<input type="submit" name="registr">
	</form>
</div>
		
<?php require_once 'footer.php'; ?>