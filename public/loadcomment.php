<?php
	require_once('../includes/main_functions.php');
	require_once('morecomments.php');
	require_once('timeago.php');
	
	global $page_position;

	if(isset($_POST['cmntid']))
	{
		$cmnt_id=$_POST['cmntid'];
		$pic_id=$_POST['picid'];
		$page_number=filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		$page_position = $_POST['page_position'];
		$del_query= "DELETE FROM comment where id=".$cmnt_id;
		$del_res=mysqli_query($con,$del_query);
	}
	else if(isset($_POST['comnt']))
	{
		$comnt = escape($_POST['comnt']);
		$pic_id = $_POST['picid'];
		$uid = $_SESSION['uid'];
		$page_number = 1;
		$query2= "SELECT userid FROM picdetail where id=$pic_id";
			$res2 = mysqli_query($con,$query2);
			$userid_row = mysqli_fetch_assoc($res2);
			$user2 = $userid_row['userid'];
		$insert_query="INSERT INTO comment(userid,pic_id,`description`,`date`) VALUES ($uid,$pic_id,'$comnt',date('d-m-Y h:i:s'))";
		$insert_res=mysqli_query($con,$insert_query);
		if($_SESSION['uid']!=$user2)
		{
			$notif_insert = "INSERT INTO notification(userid,added_by,pic_id,`action`,`read`,`date`) VALUES($user2,$uid,$pic_id,'commented on',1,date('d-m-Y h:i:s'))";	
			$notif_result = mysqli_query($con,$notif_insert);
		}
	}
	else if(isset($_POST['page']))
	{
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		$pic_id = $_POST['picid'];
	}
	else
	{
		$page_number = 1;
		$pic_id = $row["id"];

	}
			// echo "<script>alert($pic_id);</script>";
			$item_per_page = 3;
			$query2= "SELECT userid FROM picdetail where id=$pic_id";
			$res2 = mysqli_query($con,$query2);
			$userid_row = mysqli_fetch_assoc($res2);

			$query1="SELECT comment.*,user_detail.name FROM comment inner join user_detail on user_detail.id = comment.userid where pic_id=$pic_id order by id desc";
			$resnum = mysqli_query($con,$query1);
			$num = mysqli_num_rows($resnum);
			if($num==$page_position)
			{
				$page_number = $page_number-1;
			}
			$total_pages = ceil($num/$item_per_page);
			$page_position = ($page_number - 1) * $item_per_page;

			$cmnt_query="SELECT comment.*,user_detail.name FROM comment inner join user_detail on user_detail.id = comment.userid WHERE pic_id = $pic_id order by id desc limit $page_position,$item_per_page";
			$tt=mysqli_query($con,$cmnt_query);
			
			echo"<div class='previous_comments'>";
				echo previous_comments_pagination($page_number,$pic_id);
			echo"</div>";
			if($page_number>1)
			{
				echo"<hr align='center' width=84% color=#ddd>";
			}
			echo"<div class=\"showcmnt\" id='showcmnt$pic_id'>";
			if($num)
			{
				while($row1=mysqli_fetch_assoc($tt))
				{			
					echo"<a href='frontindex.php?pageName=userprofile&userid={$row1['userid']}'><div class=\"user_name\">{$row1['name']}</div></a>";
					echo"<div class=\"comment\" id=\"Comet{$row1['id']}\">{$row1['description']}</div>";
					echo"<div class=\"cmntedit\">";
						if($row1['userid']==$_SESSION['uid'])
						{
							echo"<div class='edit edit{$row1['id']}' onclick='editCmnt({$row1['id']});'>Edit</div>";
						}
						echo"<div class=\"like_cmnt\">Like</div>";
						if($userid_row['userid']==$_SESSION['uid'] || $row1['userid']==$_SESSION['uid'])
						{
							echo"<div class=\"delete\" onclick='deleteBox({$row1['id']},{$row1['pic_id']},$page_number,$page_position);'>Delete</div>";
						}
						$time = $row1['date'];
						
						$t = timeAgo($time);
						echo"<div class=\"time\">";
							echo $t;
						echo"</div>";
					echo"</div>";
					echo"<hr color=\"#e5e5e5\" align=\"center\" width=100%>";		
				}
			}	
			echo"</div>";
			echo"<div class='more_comments'>";
				echo next_comments_pagination($page_number,$total_pages,$pic_id);
			echo"</div>";
			if($total_pages>1)
			{
				echo"<hr color=\"#e5e5e5\" align=\"center\" width=84%>";	
			}
?>