<?php
$connection = new PDO("mysql:host=localhost; dbname=testlogin; charset=utf8;", 'root', '');
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
<form action="" method="post">
	<input type="text" name = "comment" required>
	<input type="submit">
</form>	

	<?php 
		foreach ($allComments as $comment) {
			 echo "<p><a href='http://testlogin/index.php?del={$comment['id']}'>удалить</a></p><p>" . $comment['comment'] . "</p><hr>";
		}
	 ?>
<?php require_once 'footer.php' ?>