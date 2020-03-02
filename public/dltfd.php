<?php
	require_once('../includes/main_functions.php');
		global $con;
		$folderid=$_POST['folderid1'];
		$uid=$_SESSION['uid'];
		$query="DELETE FROM folder WHERE foldername='$folderid' and userid='$uid'";
		$res=mysqli_query($con,$query);
		$qry = "SELECT pic_name FROM folder_pics WHERE foldername = '$folderid' AND userid ='$uid'";
		$rs = mysqli_query($con,$qry);
		
		$query1="DELETE FROM folder_pics WHERE foldername='$folderid' and userid='$uid'";
		$res1=mysqli_query($con,$query1);
		while($rw = mysqli_fetch_assoc($rs))
		{
			unlink("uploads/{$rw['pic_name']}");
		}

		if($res1)
		{
			redirectTo("frontindex.php?pageName=profilepage");

		}
		
	?>