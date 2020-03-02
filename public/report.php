<?php 
		require_once('../includes/addMemberFunction.php');
		require_once('../includes/main_functions.php');


// echo"adada";exit;
		if(isset($_POST['id']))
		{
			$id =$_POST['id'];
			$reportquery = "UPDATE picdetail SET report=report+1 where id=".$id;
			$res = mysqli_query($con,$reportquery);
			echo"This post has been reported";
		}



?>