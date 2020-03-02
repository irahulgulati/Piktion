<?php 

require_once('../includes/main_functions.php');
	if(isset($_FILES['uploadfile'] )&& isset($_POST['capbox']))
	{
		$errors = '';
		$valid = true;
			$fname = $_FILES['uploadfile']['name'];
			
			$fsize = $_FILES['uploadfile']['size'];
			$ftype = $_FILES['uploadfile']['type'];	

			// $tmp = explode("/",$_FILES['uploadfile']['type']);	
			// echo $tmp;exit;
			$file_ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
			// echo $file_ext;exit;

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
				if(isset($_POST['upldbtn']) )
				{
					$fdname=$_POST['fldbx'];
					$fdquery="INSERT INTO folder (userid, foldername,active,date) VALUES ({$_SESSION['uid']},'{$fdname}',0,now())";
					mysqli_query($con,$fdquery);
					$res = move_uploaded_file($_FILES['uploadfile']['tmp_name'], "uploads/".$fname);
					if($res)
					{
						$fdname=$_POST['fldbx'];
						$query= "INSERT INTO folder_pics (userid,pic_name,foldername) VALUES ({$_SESSION['uid']},'{$fname}','{$fdname}')";
						mysqli_query($con,$query);
						redirectTo('frontindex.php');
					}
				}
				elseif(isset($_POST['saveinfldr']) && isset($_POST['fldbx']) && !empty($_POST['fldbx']))
				{

					$fdname=$_POST['fldbx'];
					$res = move_uploaded_file($_FILES['uploadfile']['tmp_name'], "uploads/".$fname);
					if($res)
					{
						$fdname=$_POST['fldbx'];
						$query= "INSERT INTO folder_pics (userid,pic_name,foldername) VALUES ({$_SESSION['uid']},'{$fname}','{$fdname}')";
						mysqli_query($con,$query);
						redirectTo('frontindex.php');
					}
				}
				else
				{
					$cap   = $_POST['capbox'];
					$res = move_uploaded_file($_FILES['uploadfile']['tmp_name'], "uploads/".$fname);
					if($res)
					{
						$query= "INSERT INTO picdetail (userid,picname,caption,date) VALUES ({$_SESSION['uid']},'{$fname}','{$cap}',now())";
						mysqli_query($con,$query);
						redirectTo('frontindex.php');
					}
				}
			}
			else
			{
				echo"<script>alert($errors );</script>";
				redirectTo('frontindex.php');
			}
	}
?>