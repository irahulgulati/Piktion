<?php 
require_once('../includes/main_functions.php');
	if(isset($_FILES['uploaddp'] ))
	{
		if($_FILES['uploaddp']['error'] > 0)
		{
			echo "<script>alert('Error while uploading image'); window.location='frontindex.php';</script>";
		}
		else
		{
			$errors = '';
			$valid = true;
			$fname = $_FILES['uploaddp']['name'];
			$fsize = $_FILES['uploadfile']['size'];
			$ftype = $_FILES['uploadfile']['type'];		
			$file_ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
			$rand = md5(uniqid().rand());
			$fname = $rand.".".$file_ext;
			$extensions = array('jpeg','jpg','gif','png');
			if(!in_array($file_ext, $extensions))
			{
				$valid = false;
				$errors = "Extension not allowed.";
			}
			if($fsize > 2097152)
			{
				$valid = false;
				$errors = "File size must be less than 2 MB";
			}
			if($valid)
			{
				$res = move_uploaded_file($_FILES['uploaddp']['tmp_name'], "uploads/".$fname);
				if($res)
				{
					$query = "UPDATE user_detail  SET displaypic='{$fname}'  Where id=".$_SESSION['uid'];
					mysqli_query($con,$query);
					redirectTo('frontindex.php?pageName=profilepage');
				}
			}
			else
			{
				echo"<script>alert($errors);</script>";
				redirectTo('frontindex.php?pageName=profilepage');
			}
		}
	}
?>