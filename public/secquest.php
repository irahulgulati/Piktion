<?php 
		require_once('../includes/main_functions.php');
			if(checkisStringSetPost('sectxt'))
				{
					$sectxt=$_POST['sectxt'];

					$result = secquest($sectxt);
							if($result)
							{
								redirectTo('frontindex.php?pageName=editpage');
							}
				}

			function secquest($sectxt)
			{
				global $con;
				$query = "UPDATE user_detail SET security='{$sectxt}' where id=".$_SESSION['uid'];
				$res = mysqli_query($con,$query);
				return $res;
			}
?>