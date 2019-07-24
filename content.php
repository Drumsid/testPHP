<?php
session_start();
if (!$_SESSION['login']) {//проверяем существует ли сессия
		header("Location: login.php");//если нет, не пускаем
		exit;
	}
if ($_POST['destr']) {
		unset($_SESSION['login']);//удаляем сессию отменяя авторизацию
		header("Location: login.php");
	}
require_once 'header.php';

 ?>
 <p>Страница контента, только для авторизованых пользователей.</p>
<form action="" method="post">
	<p>Сбросить авторизацию</p>
	<input type="submit" name="destr" value="удалить SESSION">
</form>

<?php require_once 'footer.php'; ?>