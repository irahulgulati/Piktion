<?php
	require_once('../includes/addMemberFunction.php');
	$result = fetchUsers();
	require_once('../includes/main_functions.php');
	if(!isset($_SESSION['uname']))
	{
		header('location:../public/index.php');
	}
?>

<div class="comment_head">
	<div class="col_userid maincol" style="width:19.8%;height:20px;float:left;">UserId</div>
	<div class="col_username maincol" style="width:19.8%;height:20px;float:left;">UserName</div>
	<div class="col_useremail maincol" style="width:40%;height:20px;float:left;">Email</div>
	<div class="col_delete maincol" style="width:19.8%;height:20px;float:left;border:none;">Delete</div>
</div>
<?php 
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<div class=\"main_users\" style=\"width:100%;height:30px;margin-top:5px;background:#c6c6c6;\">";
			echo "<div class=\"userid\" style=\"width:178px;height:30px;float:left;border-right:1px solid #fff;\">";
				echo "<div class=\"user_id col\">{$row['id']}</div>";
			echo "</div>";
			echo "<div class=\"username\" style=\"width:177px;height:30px;float:left;border-right:1px solid #fff;\">";
				echo "<div class=\"username_text col\">{$row['name']}</div>";
			echo "</div>";
			echo "<div class=\"useremail\" style=\"width:358px;height:30px;float:left;border-right:1px solid #fff;\">";
				echo"<div class=\"email_text col\">{$row['email']}</div>";
			echo"</div>";
			echo"<div class=\"delete\" style=\"width:179px;height:30px;float:left;\">";
				echo"<div class=\"delete_link col\"><a href=\"deleteuser.php?id={$row['id']}\" style=\"color:#000;\">Delete</a></div>";
			echo"</div>";
		echo"</div>";
	}
?>