<?php 
		require_once('../includes/addMemberFunction.php');
		require_once('../includes/main_functions.php');

		$newpwd = $_POST['shrtxt'];
		$urid=$_SESSION['uid'];
		// $query = "INSERT INTO user (secansr) VALUES ('{$newpwd}')"; 
		$query="UPDATE user_detail SET security='{$newpwd}' WHERE id=$urid";
		$res=mysqli_query($con,$query);
		echo"Your response has been recorded";





?>