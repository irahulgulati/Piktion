<?php 
	require_once('../includes/main_functions.php');
	require_once('../includes/addMemberFunction.php');
	$check_notif = mysqli_query($con,"SELECT COUNT(*) AS total FROM notification where userid='{$_SESSION['uid']}' AND `read`=1");
	$data = mysqli_fetch_assoc($check_notif);
	if($data['total'])
	{
		echo $data['total'];
	}
?>