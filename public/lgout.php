<?php
	require_once('../includes/main_functions.php');
	unset($_SESSION['uname']);
	unset($_SESSION['uid']);
	session_destroy();
	header('location:../index.php');
	exit;

?>
