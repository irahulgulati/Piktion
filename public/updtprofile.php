<?php 
		require_once('../includes/addMemberFunction.php');
		require_once('../includes/main_functions.php');
			if(checkisStringSetPost('editname') && checkisStringSetPost('edml') && checkIsIntSetPost('edcon') && checkisStringSetPost('edprof') && checkIsIntSetPost('eddb') && checkIsIntSetPost('edgr'))
				{
					$name=$_POST['editname'];
					$email=$_POST['edml'];
					$contact= $_POST['edcon'];
					$profession= $_POST['edprof'];
					$dob=$_POST['eddb'];
					$gndr=$_POST['edgr'];
					$result = updateusr($name,$email,$contact,$profession,$dob, $gndr);
					
							if($result)
							{
								echo"Your Profile Has Been Updated";
							}
				}
?>