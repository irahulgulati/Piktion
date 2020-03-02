<?php
	require_once('../includes/main_functions.php');
	$uid=$_SESSION['uid'];
	$foldername = $_POST['dlt_fld_hid'];
	$query="SELECT foldername,id FROM folder WHERE foldername='{$foldername}'";
	$res=mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($res);
	if($row['foldername']==$foldername)
	{
		$qry = "SELECT pic_name FROM folder_pics WHERE foldername = '$foldername' AND userid ='$uid'";
		$rs = mysqli_query($con,$qry);
		$query1="DELETE FROM folder WHERE foldername='{$row['foldername']}'";
		$res1=mysqli_query($con,$query1);
		$query3="DELETE FROM folder_pics WHERE foldername='$folderid' and userid='$uid'";
		$res3=mysqli_query($con,$query3);
		while($rw = mysqli_fetch_assoc($rs))
		{
			unlink("uploads/{$rw['pic_name']}");
		}	
		redirectTo('frontindex.php?pageName=profilepage');
	}
	else
	{
		$query2="DELETE FROM notify_folder WHERE foldername='{$foldername}'";
		$res2=mysqli_query($con,$query2);
		redirectTo('frontindex.php?pageName=profilepage');		
	}
	
?>