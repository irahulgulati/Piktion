<?php 
	require_once('main_functions.php');
	// insertUser function starts here 
	function insertUser($email,$password,$isactive,$isadmin)
	{
		$query = "INSERT INTO user_detail (email,password,isactive,isadmin) VALUES ('{$email}','{$password}',{isactive},{isadmin})";
		$res = mysqli_query($con,$query);
		if($res) return true;
		else return false;
	}

	// update user starts here 
	function updateUser($id,$email,$password,$isactive,$isadmin)
	{
		$query = "UPDATE user_detail SET email = '{$email}',password = '{$password}',isactive={$isactive},isadmin = {$isadmin} where id = {$id}";
		$res = mysqli_query($con,$query);
		if($res) return true;
		else return false;
	}

	// select user function starts here 
	
?>