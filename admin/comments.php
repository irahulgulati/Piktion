<?php
	require_once('../includes/addMemberFunction.php');
	$result = fetchComments();
	require_once('../includes/main_functions.php');
	if(!isset($_SESSION['uname']))
	{
		header('location:../public/index.php');
	}


?>

<div class="comment_head">
	<div class="col_user maincol" style="width:19.8%;height:20px;float:left;">User</div>
	<div class="col_comment maincol" style="width:40%;height:20px;float:left;">Comment</div>
	<div class="col_post maincol" style="width:19.8%;height:20px;float:left;">Post</div>
	<div class="col_delete maincol" style="width:19.8%;height:20px;float:left;">Delete</div>
</div>
<?php 
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<div class=\"main_comment\" style=\"width:100%;height:180px;margin-top:5px;background:#c6c6c6;\">";
			echo "<div class=\"user\" style=\"width:178px;height:180px;float:left;border-right:1px solid #fff;\">";
				echo "<div class=\"user_text comcol\">{$row['name']}</div>";
			echo "</div>";
			echo "<div class=\"comment\" style=\"width:358px;height:180px;float:left;border-right:1px solid #fff;\">";
				echo "<div class=\"comment_text\">{$row['description']}</div>";
			echo "</div>";
			echo "<div class=\"post\" style=\"width:177px;height:180px;float:left;border-right:1px solid #fff;\">";
				echo"<div class=\"post_text comcol\">Post</div>";
			echo"</div>";
			echo"<div class=\"delete\" style=\"width:179px;height:180px;float:left;\">";
				echo"<div class=\"delete_link comcol\"><a href=\"#\" style=\"color:#000;\">Delete</a></div>";
			echo"</div>";
		echo"</div>";
	}
?>