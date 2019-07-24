<?php
$connection = new PDO("mysql:host=localhost; dbname=testlogin; charset=utf8;", 'root', '');
function myDump($date){
	echo "<pre>";
	print_r($date);
	echo "</pre>";
}
?>

