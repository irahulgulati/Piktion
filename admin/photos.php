<?php
	require_once('../includes/addMemberFunction.php');
	$result = fetchPhotos();
	require_once('../includes/main_functions.php');
	if(!isset($_SESSION['uname']))
	{
		header('location:../public/index.php');
	}
?>
<div class="comment_head">
	<div class="col_picid maincol" style="width:10%;height:20px;float:left;">PicId</div>
	<div class="col_userid maincol" style="width:10%;height:20px;float:left;">UserId</div>
	<div class="col_picname maincol" style="width:35.3%;height:20px;float:left;">PicName</div>
	<div class="col_time maincol" style="width:12%;height:20px;float:left;">Time</div>
	<div class="col_date maincol" style="width:12%;height:20px;float:left;">Date</div>
	<div class="col_delete maincol" style="width:18%;height:20px;float:left;border:none;">Delete</div>
</div>
<?php 
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<div class=\"main_users\" style=\"width:100%;height:30px;margin-top:5px;background:#c6c6c6;\">";
			echo "<div class=\"picid\" style=\"width:10%;height:30px;float:left;border-right:1px solid #fff;\">";
				echo "<div class=\"pic_id col\">{$row['id']}</div>";
			echo "</div>";
			echo "<div class=\"userid\" style=\"width:10%;height:30px;float:left;border-right:1px solid #fff;\">";
				echo "<div class=\"userid_text col\">{$row['userid']}</div>";
			echo "</div>";
			echo "<div class=\"picname\" style=\"width:35.3%;height:30px;float:left;border-right:1px solid #fff;\">";
				echo"<div class=\"pic_text col\">{$row['picname']}</div>";
			echo"</div>";
			echo"<div class=\"time\" style=\"width:12%;height:30px;float:left;border-right:1px solid #fff;\">";
				echo"<div class=\"time_text col\">{$row['time']}</div>";
			echo"</div>";
			echo"<div class=\"date\" style=\"width:12%;height:30px;float:left;border-right:1px solid #fff;\">";
				echo"<div class=\"date_txt col\">{$row['date']}</div>";
			echo"</div>";
			echo"<div class=\"delete\" style=\"width:18%;height:30px;float:left;\">";
				echo"<div class=\"delete_link col\"><a href=\"deletepic.php?id={$row['id']}\" style=\"color:#000;\">Delete</a></div>";
			echo"</div>";
		echo"</div>";
	}
?>