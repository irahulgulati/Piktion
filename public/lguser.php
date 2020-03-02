<?php
	require_once('../includes/main_functions.php');
	require_once('../includes/logusr.php');
	function make_safe($variable) {
		global $con;
    $variable = mysqli_real_escape_string($con, $variable);
    return $variable;
}
		if(checkisStringSetPost('lgusrnm') && checkisIntSetPost('lgusrpwd'))
		{
			$lgusrnm=make_safe($_POST['lgusrnm']);

			$lgusrpwd = make_safe($_POST['lgusrpwd']);
			
			$result = lgusr($lgusrnm,$lgusrpwd);
			
			if(isset($result))
			{
				echo $result;
			}
		}

?>