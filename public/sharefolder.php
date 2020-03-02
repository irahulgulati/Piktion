<?php
	require_once('../includes/main_functions.php');
	require_once('../includes/addMemberFunction.php');
	if(isset($_POST['shrtxt']))
	{
	 	$shrtxt = $_POST['shrtxt'];
		$fdname2 = $_POST['fdname'];
		
		$query= "SELECT * FROM user_detail WHERE email='{$shrtxt}'";
		$res=mysqli_query($con,$query);
		$num = mysqli_num_rows($res);
		if($num)
		{
			$row=mysqli_fetch_assoc($res);
			$fdname=$row['id'];
			$uid = $_SESSION['uid'];
			$query2="UPDATE user_detail SET active=1 WHERE id= {$fdname}";
			$res2=mysqli_query($con,$query2);
			$query3="INSERT INTO `notify_folder`( `foldername`, `from_uid`, `userid`, `read`, `date`) VALUES ('{$fdname2}',$uid,$fdname,0,NOW()) ";
			$res3=mysqli_query($con,$query3);
			$query4="UPDATE folder SET active=1 WHERE foldername='{$fdname2}' and userid= {$uid}";
			$res4=mysqli_query($con,$query4);
			$uu=array($shrtxt,$fdname2,$uid,);
			$new=implode($uu,"/");
			echo($new);


		}
	}
?>