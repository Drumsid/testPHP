<?php
session_start();
ob_start(); // пока без этой строчки вылезает ошибка Cannot modify header information как решить это иначе я пока не знаю.
require_once 'connection.php';
if ($_POST['submit']) {
			$users = $connection->query("SELECT * FROM `users` ");
			foreach ($users as $user) {
				if ($user['login'] == $_POST['login'] && $user['password'] == $_POST['password']) {
					$_SESSION['login'] = $_POST['login'];
					header("location: content.php");
				} 	
			}
			$out = 'Неправельный логин или пароль!';
	}

if ($_POST['registr']) {
			$users = $connection->query("SELECT * FROM `users` ");
			foreach ($users as $user) {
				if ($user['login'] == $_POST['regLogin']) {
					$out2 = 'Такой пользователь уже существует!';
				}
			}
			if (!$out2) {
				$regLogin = $_POST['regLogin'];
				$regPassword = $_POST['regPassword'];
				$connection->query("INSERT INTO `users` (`login`, `password`) VALUES ('$regLogin', '$regPassword')");
				$out2 = 'Регистрация зваершина успешно!';
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