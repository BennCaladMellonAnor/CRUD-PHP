<?php
	require_once("../database/searcher.php");

	$searcher = new Searcher();
	$searcher->add($_POST['data']);

	header("Location: ../../index.php");
	exit();
?>