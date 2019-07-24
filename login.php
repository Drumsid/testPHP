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
	$out2 = signUpNewUser($_POST['regLogin'], $_POST['regPassword']);			
}

	require_once 'header.php';
?>
<p class=" <?php echo $_SESSION['login'] ? 'hiddenform' : ''?>">Форма авторизации.</p>
<?= $out; ?>
<div class="wrap-form <?php echo $_SESSION['login'] ? 'hiddenform' : ''?>">
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