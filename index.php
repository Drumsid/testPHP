<?php
ob_start();// пока без этой строчки вылезает ошибка Cannot modify header information как решить это иначе я пока не знаю.

//подключаем бд и функции
require_once 'connection.php';

//добавляем коментарий
if ($_POST['comment']) {
	addComment($_POST['comment']);
}

//удаляем коментарий
if ($_GET['del']) {
	delComment($_GET['del']);
}

//из бд принимаем массив соментариев
$allComments = getAllCommentsFromDB();
?>
<?php require_once 'header.php';?>
<p>Оставить комментарий.</p>
<form action="" method="post">
	<input type="text" name = "comment" required>
	<input type="submit">
</form>	

	<?php //выводим все коментарии циклом
		foreach ($allComments as $comment) {
			 echo "<p><a href='http://testlogin/index.php?del={$comment['id']}'>удалить</a></p><p>" . $comment['comment'] . "</p><hr>";
		}
	 ?>
<?php require_once 'footer.php'; ?>