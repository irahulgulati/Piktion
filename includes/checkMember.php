<?php
	require_once('main_functions.php');

	function searchMember($name,$password)
	{
		global $con;
		$query = "SELECT * FROM user_detail where name='{$name}' and password='{$password}' and isadmin=1";
		$res = mysqli_query($con,$query);
		if($row=mysqli_fetch_assoc($res))
		{
				$_SESSION['uname']=$row['name'];
				$_SESSION['uid']=$row['id'];

			return true;
		}
		else
		{
			return false;
		}

	}
?>