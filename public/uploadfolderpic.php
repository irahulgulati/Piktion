<?php
	require_once('../includes/main_functions.php');
	if($_POST['submitpic'])
	{
		global $con;
		 $cap   = $_POST['capbox'];
		$fpicname = $_POST['folderpicnm'];
		$query = "INSERT INTO picdetail (userid,picname,caption,date) VALUES ({$_SESSION['uid']},'{$fpicname}','{$cap}',now())";
		mysqli_query($con,$query);
		redirectTo('frontindex.php');
	}
?>