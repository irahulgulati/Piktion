<?php
	require_once('../includes/main_functions.php');
	if(isset($_POST['picid']))
	{
			global $con;
		$picid=$_POST['picid'];
		$foldername=$_POST['foldername'];
		$qry = "SELECT pic_name FROM folder_pics WHERE id =". $picid;
		$rs = mysqli_query($con,$qry);
		$rw = mysqli_fetch_assoc($rs);
		$pic_name = $rw['pic_name'];
		$query= "DELETE FROM folder_pics where id=".$picid;
		$res=mysqli_query($con,$query);
		unlink("uploads/".$pic_name);
		$query1= "SELECT * FROM folder_pics WHERE foldername = '{$foldername}' ORDER BY id desc";
		$res1 = mysqli_query($con,$query1);
		while($row1=mysqli_fetch_assoc($res1))
		{
			echo"<div class='imgholder1 abcd'style='width:250px;height:250px;float:left;margin-left:10px;margin-top:10px;box-shadow:0px 0px 10px 0px black;'>";
				echo"<div class='imgholder2 abcd' style='width:250px;height:250px;margin:auto;overflow:hidden;z-index:3'>";
					echo "<img alt='imgThumb1'class='folderimg abcd' id='folderimg{$row1['id']}'src='uploads/{$row1['pic_name']}' onclick='showImage({$row1['id']});'/>";
				echo"</div>";
				echo"<div class='imghiddenwrapper'>";
					echo"<div class='pic_action'id='upicon'>";
						echo"<img src='img/upload.png' class='icon' id='upicon{$row1['id']}' onclick='showImage1({$row1['id']});'/>";
					echo"</div>";
					echo"<div class='pic_action'>";
						echo"<input type='image' src='img/download.png' class='icon'/>";
					echo"</div>";
					echo"<div class='pic_action' style='border:none'>";
						echo"<input type='hidden' value='{$row1['id']}' id='picid' name='picid'/>";
						echo"<input type='image' src='img/dlfl.png' class='delete_action' onclick='deleteFolderPic({$row1['id']});'/>";
						echo"<input type='hidden' value='{$row1['foldername']}' id='folderid' name='folderid'/>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		}
	}
?>