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
	echo "<pre>";
	var_dump($_SESSION);	
	echo "</pre>";
 ?>
<form action="" method="post">
	<input type="submit" name="destr">
</form>

<?php require_once 'footer.php'; ?>