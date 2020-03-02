<?php


	require_once('main_functions.php');

	function insertMail($fmail)
	{
		global $con;

	$query = "INSERT INTO fgtpass (fmail) VALUES ( '{$fmail}')";
	$res=mysqli_query($con,$query);
	if ($res)
	{

		return true;
	}
	else
	 {
		return false;
	}
	
}

?>