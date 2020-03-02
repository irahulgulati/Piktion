<?php 
	require_once('../includes/main_functions.php');
	require_once('../includes/addMemberFunction.php');
	$uid=$_SESSION['uid'];

		$q1 = "SELECT user_detail.name,user_detail.displaypic, notification.action, picdetail.id, picdetail.caption from notification INNER JOIN user_detail ON user_detail.id = notification.added_by INNER JOIN picdetail ON picdetail.id = notification.pic_id where notification.userid = $uid AND notification.read = 1 ORDER BY notification.date desc";
		$res1 = mysqli_query($con,$q1);
		$c1 = mysqli_num_rows($res1);
		if($c1)
		{
			while($row1 = mysqli_fetch_assoc($res1))
			{
				$name = $row1['name'];
				$action = $row1['action'];
				$caption = $row1['caption'];
				echo "<a style='color:#259;' href='frontindex.php?pageName=post&picid={$row1['id']}'>";
				echo "<div class='notify_list'>
					<div style='width:30px;height:30px;float:left;'>
						<img style='width:30px;height:30px;border-radius:50%;' src='uploads/{$row1['displaypic']}'/>
					</div>
					<div style='float:left;font-weight:bold;'>&nbsp$name</div>
					<div style='float:left;'>&nbsp$action</div> 
					<div style='float:left;'>&nbspyour post</div>";
					if($caption)
					{
						echo "<div style='float:left;'>&nbsp'$caption'.</div>";
					}
				echo "</div>";
				echo "</a>";
			}
		}
		else
		{
			echo "<div class='notify_list'>No Notifications...</div>";
		}
		// $query= "SELECT * FROM user_detail WHERE id= $new";
		// $res=mysqli_query($con,$query);

		// if($res)
		// {
		

		// 	$row=mysqli_fetch_assoc($res);

		// 	$fdname=$row['id'];
		// 	$active=$row['active'];
		// 	if($active==1)
		// 	{
		// 		$query3="SELECT * from `notify_folder` WHERE userid=$fdname";
		// 		$res3=mysqli_query($con,$query3);

			
		// 		while($row3=mysqli_fetch_assoc($res3))
		// 		{
		// 			$foldername=$row3['foldername'];
		// 			$fromid=$row3['from_uid'];
		// 			$query4="SELECT * from folder WHERE foldername=$foldername";
		// 			$res4=mysqli_query($con,$query4);
		// 			$query5= "SELECT * FROM user_detail WHERE id= $fromid";
		// 			$res5=mysqli_query($con,$query5);
		// 			$row5=mysqli_fetch_assoc($res5);	
		// 			$sname=$row5['name'];			
		// 			echo "<div class='notify_list'>$sname shared a folder with you.</div>";
		// 		}

		// 	}
		// }
?>


