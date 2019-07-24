<?php
session_start();//до сюда функции добавил дальше уже на свежую голову надо еще покумекать

//проверяем существует ли сессия
if (!$_SESSION['login']) {
		header("Location: login.php");//если нет, не пускаем
		exit;
	}
	
//удаляем сессию отменяя авторизацию
if ($_POST['destr']) {
		unset($_SESSION['login']);
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