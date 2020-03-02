<?php 

	require_once('config.php');
	// for redirecting 
	function redirectTo($loc)
	{
		header('location:'.$loc);
		exit;
	}

	function encodeUrl($url='')
	{
		if(!empty($url)) return encodeUrl($url);
		return false;
	}
	function checkisStringSetPost($name)
	{
		if(isset($_POST[$name])|| !empty($_POST[$name])|| is_string($_POST[$name]))
		{
			return true;
			}
		
		else  return false;
		
	}
	function checkIsIntSetPost($name)
	{
		if(isset($_POST[$name])|| !empty($_POST[$name]))
		{
			return true;
		}
		else  
			{
				return false;
			}
		
	}
	

	

?>