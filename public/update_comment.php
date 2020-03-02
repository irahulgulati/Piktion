<?php
	require_once('../includes/main_functions.php');
	if(isset($_POST['id']))
		{

			$id = $_POST['id'];
			$edit_cmnt = $_POST['editcomment'];
			$query = "UPDATE comment SET description='{$edit_cmnt}' WHERE id=$id";
			$res = mysqli_query($con,$query);
		}
?>