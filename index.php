<?php
ob_start();// пока без этой строчки вылезает ошибка Cannot modify header information как решить это иначе я пока не знаю.
require_once 'connection.php';
if ($_POST['comment']) {
	$newComment = $_POST['comment'];
	$connection->query("INSERT INTO `comments` (`comment`) VALUES ('$newComment');");
	header("Location: " . $_SERVER['REQUEST_URI']);
}
if ($_GET['del']) {
	$del = $_GET['del'];
	$connection->query("DELETE FROM comments WHERE id = $del");
}
$allComments = $connection->query("SELECT * FROM comments ORDER BY comment DESC");
?>
<?php require_once 'header.php';?>
<p>Оставить комментарий.</p>
<form action="" method="post">
	<input type="text" name = "comment" required>
	<input type="submit">
</form>	

	<?php 
		foreach ($allComments as $comment) {
			 echo "<p><a href='http://testlogin/index.php?del={$comment['id']}'>удалить</a></p><p>" . $comment['comment'] . "</p><hr>";
		}
	 ?>
<?php require_once 'footer.php'; ?>