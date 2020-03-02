<?php
	require_once('../includes/checkMember.php');
	
	

		if(checkisStringSetPost('name') && checkisStringSetPost('password'))
		{
			$name=$_POST['name'];
			
			$password = $_POST['password'];
			
			$result = searchMember($name,$password);
			if($result)
			{
				redirectTo('index.php');
			}
			else
			{
				echo "<script>alert ('Invalid Username or Password'); window.location='signAdmin.php';</script>";
				
			}
		}

?>