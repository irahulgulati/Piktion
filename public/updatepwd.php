<?php 
		require_once('../includes/addMemberFunction.php');
		require_once('../includes/main_functions.php');
			$urid=$_SESSION['uid'];
			$newpwd = $_POST['shrtxt'];
			$oldpwd=$_POST['oldpwd'];
		$query2="SELECT password FROM user_detail where id='{$_SESSION['uid']}'";
				$res1=mysqli_query($con,$query2);
				$row1=mysqli_fetch_assoc($res1);
					$pwd1=sha1($oldpwd);
			$hash=md5('pk16jn25aug15RgaS21');
			$salt=sha1('btchdvtctinst');
			$salt1=crc32($pwd1);
			$hash1=md5($salt1);
			$slths=sha1($salt.$hash.$salt1);
			$pwd10=$pwd1.$hash.$salt.$salt1.$hash1.$slths;

				if($pwd10==$row1['password'])
				{
			
		$pwd1=sha1($newpwd);
			$hash=md5('pk16jn25aug15RgaS21');
			$salt=sha1('btchdvtctinst');
			$salt1=crc32($pwd1);
			$hash1=md5($salt1);
			$slths=sha1($salt.$hash.$salt1);
			$pwd=$pwd1.$hash.$salt.$salt1.$hash1.$slths;
		//echo $uid;
		
		$query= "UPDATE user_detail SET password='{$pwd}' WHERE id=$urid";
		$res=mysqli_query($con,$query);
		echo"Your Password has been changed";
		

	}
	else if($pwd10 !=$row1['password']){
		echo"Old Password Is Wrong";
	}

?>