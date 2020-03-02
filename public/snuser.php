<?php 
		require_once('../includes/addMemberFunction.php');
		require_once('../includes/main_functions.php');
		function make_safe($variable) {
			global $con;
    $variable = mysqli_real_escape_string($con, $variable);
    return $variable;
}
			if(checkisStringSetPost('sgnname') && checkisStringSetPost('sgnemail') &&checkisStringSetPost('sgnpwd')&& checkIsIntSetPost('sgncnt'))
				{

					$name=make_safe($_POST['sgnname']);
					$email=make_safe($_POST['sgnemail']);
					$password = make_safe($_POST['sgnpwd']);
					$contact=make_safe( $_POST['sgncnt']);
					$dob=make_safe($_POST['sgndob']);
					$gndr=make_safe($_POST['sgngndr']);
					$result = signMember($name,$email,$password,$contact,$dob, $gndr);
						if($result)
							{
								echo "You are successfully signed up!!";
							}			
				}
	
?>