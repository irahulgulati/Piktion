<?php 
require_once('../includes/main_functions.php');
	if(isset($_FILES['uploaddp'] ))
	{

		if($_FILES['uploaddp']['error'] > 0)
		{
			echo "<script>alert('Error while uploading image'); window.location='frontindex.php';</script>";
		}else{
			
			$fname = $_FILES['uploaddp']['name'];
			$ftype = $_FILES['uploaddp']['type'];
			
			$ftype = explode("/",$ftype);
			
			$res = move_uploaded_file($_FILES['uploaddp']['tmp_name'], "uploads/".$fname);
			
			if($res)
			{
				
			$query = "UPDATE user_detail  SET displaypic='{$fname}'  Where id=".$_SESSION['uid'];
				
			
				mysqli_query($con,$query);
				
				redirectTo('frontindex.php?pageName=profilepage');
	
			}else{
				echo "Error while uploading image";	
			}
		}
	}

	

?>