<?php
	require_once('../includes/main_functions.php');

		$mail = $_POST['fgtem'];
		$q = "SELECT * FROM user_detail WHERE email='{$mail}'";
		$r = mysqli_query($con,$q);
		$rs = mysqli_fetch_assoc($r);
		if($rs)
		{
			$to = $rs['email'];
			$subject = "Remind Password";
			$message = "Your Password".$rs['password'];
			$from = "info@piktion.com";
			$headers = "FROM:".$from."\n";
			$headers = "Reply To:".$from."\n";
			$mailsent = mail($to,$subject,$message,$from,$headers);
				if($mailsent)
				{
					echo"<script>alert('Password has been sent to your email');</script>";
				}
				else
				{
					echo"<script>alert('Failed to connect to server');</script>";
				}
		}
		else
		{
			echo"<script>alert('Account Not Found');</script>";
		}
	
?>