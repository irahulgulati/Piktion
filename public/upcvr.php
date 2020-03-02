<?php 
require_once('../includes/main_functions.php');
	if(isset($_FILES['uploadcvr'] ))
	{
		
		if($_FILES['updcvr']['error'] > 0)
		{
			echo "<script>alert('Error '); window.location='frontindex.php';</script>";
		}else{
			
			$fname = $_FILES['uploadcvr']['name'];
			$ftype = $_FILES['uploadcvr']['type'];
			
			$ftype = explode("/",$ftype);
			
			$res = move_uploaded_file($_FILES['uploadcvr']['tmp_name'], "uploads/".$fname);
			
			if($res)
			{
				
				$query= "UPDATE user_detail SET coverimg ='{$fname}' WHERE id=".$_SESSION['uid'];
				mysqli_query($con,$query);
				
				redirectTo('frontindex.php');
	
			}else{
				echo "Error while uploading image";	
			}
		}
	}
