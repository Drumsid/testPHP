<?php
session_start();
if (!$_SESSION['login']) {
		header("Location: login.php");
		exit;
	}
if ($_POST['destr']) {
		unset($_SESSION['login']);
		header("Location: login.php");
	}
require_once 'header.php';
	// echo "<pre>";
	// var_dump($_SESSION);	
	// echo "</pre>";
 ?>
 <p>Страница контента, только для авторизованых пользователей.</p>
<form action="" method="post">
	<p>Сбросить авторизацию</p>
	<input type="submit" name="destr" value="удалить SESSION">
</form>

<?php require_once 'footer.php'; ?>