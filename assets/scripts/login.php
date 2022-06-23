<?php 
	require_once('../database/login.php');

	$db = new Login();
	$login = $db->checkLogin();

	if($login){
		//24hours
		setcookie('id', $login['id'], time()+60*60*24, '/');
	}
	//Index.php
	header("Location: ../../index.php");
	exit();

?>