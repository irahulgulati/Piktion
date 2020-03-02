<?php
require_once('../includes/main_functions.php');
require_once('../includes/addMemberFunction.php');
if(isset($_GET['cvrname']))
{
		global $con;
		$cvrname = $_GET['cvrname'];
		$query1 = "UPDATE user_detail SET coverimg='' where id=".$_SESSION['uid'];
		$res1 = mysqli_query($con,$query1);
		unlink("uploads/".$cvrname);
		if($res1)
		{
			redirectTo('frontindex.php?pageName=profilepage');
		}
	}
?>