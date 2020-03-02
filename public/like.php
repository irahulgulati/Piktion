<?php
	require_once('../includes/main_functions.php');
	require_once('../includes/addMemberFunction.php');
	if(isset($_POST['likebtn']))
	{

		$picid = $_POST['hidpicid'];
		$query = "SELECT * FROM picdetail WHERE id=".$picid;
		$res = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($res);
		if($row['liked_by'] == $_SESSION['uid'] && $row['id']== $picid)
		{
			// echo"im here";exit;
			redirectTo('frontindex.php');
		}
		elseif($row['dislikes']==0)
		{
			$add = $row['likes'];
			$count = 1;
			$addlike = $add + $count;

			$query1 = "UPDATE picdetail SET likes= $addlike,liked_by={$_SESSION['uid']},disliked_by=0 WHERE id=".$picid;
			$res1 = mysqli_query($con,$query1);
			if($res1)
			{
				redirectTo('frontindex.php');
			}
		}
		else
		{
			$add = $row['likes'];
			$count = 1;
			$addlike = $add + $count;

			$query1 = "UPDATE picdetail SET likes= $addlike,dislikes=dislikes-1,liked_by={$_SESSION['uid']},disliked_by=0 WHERE id=".$picid;
			$res1 = mysqli_query($con,$query1);
			if($res1)
			{
				redirectTo('frontindex.php');
			}
		}
	}
	if(isset($_POST['dislikebtn']))
	{

		$picid = $_POST['hidpicid'];
		$query = "SELECT * FROM picdetail WHERE id=".$picid;
		$res = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($res);
		if($row['disliked_by'] == $_SESSION['uid'] && $row['id']== $picid)
		{
			// echo"im here";exit;
			redirectTo('frontindex.php');
		}
		elseif($row['likes']==0)
		{
			$add = $row['dislikes'];
			$count = 1;
			$add_dislike = $add + $count;

			$query1 = "UPDATE picdetail SET dislikes= $add_dislike,liked_by=0,disliked_by={$_SESSION['uid']} WHERE id=".$picid;
			$res1 = mysqli_query($con,$query1);
			if($res1)
			{
				redirectTo('frontindex.php');
			}
		}
		else
		{
			$add = $row['dislikes'];
			$count = 1;
			$add_dislike = $add + $count;

			$query1 = "UPDATE picdetail SET dislikes= $add_dislike,likes= likes - 1,liked_by=0,disliked_by={$_SESSION['uid']} WHERE id=".$picid;
			$res1 = mysqli_query($con,$query1);
			if($res1)
			{
				redirectTo('frontindex.php');
			}
		}
	}
?>
