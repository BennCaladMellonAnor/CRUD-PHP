<?php 
	require_once __DIR__."/assets/variables/globals.php";

	//Verify Login
	$user = isset($_COOKIE['id']);

	//if login *index.php* else *login.php*
	$currentPagePath = $user ? INDEX_PAGE : LOGIN_PAGE;

	if($_GET){
		$currentPagePath = $_GET['location'];
	}

	//Last argument, load page.
	include $currentPagePath;
?>