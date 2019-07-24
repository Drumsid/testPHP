<?php
// $connection = new PDO("mysql:host=localhost; dbname=testlogin; charset=utf8;", 'root', '');
// if ($_POST) {
// 			$users = $connection->query("SELECT * FROM `users` ");
// 			foreach ($users as $user) {
// 				if ($user['login'] == $_POST['login'] && $user['password'] == $_POST['password']) {
// 					$_SESSION['login'] = $_POST['login'];
// 					header("location: content.php");
// 				} 	
// 			}
// 			$out = 'Неправельный логин или пароль!';
// 	}

// 	echo "<pre>";
// 	var_dump($users);	
// 	echo "</pre>";
session_start();
$login = "Denis";
$password = "12345";
if ($_POST['submit']) {
	if ($_POST['login'] == $login && $_POST['password'] == $password) {
		$_SESSION['login'] = $_POST['login'];
		header("Location: content.php");
	} else {
		$out = 'Неправельный логин или пароль!';
	}
}

	echo "<pre>";
	var_dump($_POST);	
	echo "</pre>";
	echo "<pre>";
	var_dump($_SESSION);	
	echo "</pre>";


	require_once 'header.php';
?>
<?= $out; ?>
<div class="wrap-form">
	<form action="" method="post">
		<input type="text" name="login" required>
		<input type="text" name = "password" required>
		<input type="submit" name="submit">
	</form>
</div>
		
<?php require_once 'footer.php'; ?>