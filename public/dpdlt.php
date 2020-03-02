<?php
require_once('../includes/main_functions.php');
require_once('../includes/addMemberFunction.php');
if(isset($_GET['dpname']))
{
		global $con;
		$dpname = $_GET['dpname'];
		$gndr = $_SESSION['ugndr'];
		if($gndr=="Male")
		{
			$pic = "dmyml.png";
		}
		else
		{
			$pic ="dmyfml.png";
		}
		$query1 = "UPDATE user_detail SET displaypic='{$pic}' where id=".$_SESSION['uid'];
		$res1 = mysqli_query($con,$query1);
		unlink("uploads/".$dpname);
		if($res1)
		{
			redirectTo('frontindex.php?pageName=profilepage');
		}
	}
?>