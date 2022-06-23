<?php 
	unset($_COOKIE['id']);
	setcookie('id', null, -1, '/');
	header("Location: index.php");

?>