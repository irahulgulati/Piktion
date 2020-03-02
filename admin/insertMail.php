<?php
		
		require_once('../includes/entermail.php');
		
		if(checkisStringSetPost('fgtml') )
		{	
			
			$fmail = $_POST['fgtml'];
			
			$result = insertMail($fmail);
			if($result)
			{
				redirectTo('signAdmin.php');
				
			}
			else
			{
				redirectTo('signAdmin.php');
		}
	}


?>