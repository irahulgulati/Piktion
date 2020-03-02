<?php
		require_once('../includes/addMemberFunction.php');
		if(checkisStringSetPost('name') && checkisStringSetPost('mail') && checkIsIntSetPost('password'))
		{
			$name=$_POST['name'];
			$mail = $_POST['mail'];
			$password = $_POST['password'];
			$isadmin = $_POST['isadmin'];
			$isactive = $_POST['isactive'];
			if($isadmin=='on') $isadmin=1;
			else $isadmin = 0;
			if($isactive=='on') $isactive=1;
			else $isactive = 0;
			$result = insertMember($name,$mail,$password,$isadmin,$isactive);
			if($result)
			{
				echo "<script>alert ('Member inserted'); window.location='index.php?pageName=addMember'</script>";
			}
			else
				
				echo "try again".mysqli_error($con);
		}
		else 
		{
			//echo "<script>alert ('Member inserted'); window.location='index.php?pageName=addMember'</script>";
			redirectTo ('index.php?pageName=addMember'); 
		

		}




?>