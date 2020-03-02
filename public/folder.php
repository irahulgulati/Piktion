<?php
	require_once('../includes/main_functions.php');
	require_once('../includes/addMemberFunction.php');
	global $res5;
	global $row5;
	if(!isset($_SESSION['uid'])) redirectTo('index.php');
	$foldername = $_GET['foldername'];
	$query3 ="SELECT pic_name,foldername,id FROM folder_pics WHERE foldername='{$foldername}' ORDER BY id desc";
	$res2=mysqli_query($con,$query3);
	$query4 ="SELECT * FROM folder WHERE foldername='{$foldername}'";
	$res3=mysqli_query($con,$query4);
	$row3=mysqli_fetch_assoc($res3);
	$fdid = $row3['id'];
	if($row3['active']==1){

		$query4="SELECT  * FROM notify_folder WHERE foldername='{$foldername}'";
		$res4=mysqli_query($con,$query4);
		$row4=mysqli_fetch_assoc($res4);
		$dd=$row4['from_uid'];
		$query5="SELECT * FROM user_detail WHERE id={$dd}";
		$res5=mysqli_query($con,$query5);
		$row5=mysqli_fetch_assoc($res5);

	}
	else{
		if($row3['active']==0){
			$rr=$_SESSION['uid'];
			$query5="SELECT * FROM user_detail WHERE id={$rr}";
			$res5=mysqli_query($con,$query5);
			$row5=mysqli_fetch_assoc($res5);
		}

	}
	if(isset($_POST['submit']))
	{
		$shrml=$_POST['shrtxt'];
		$query1="SELECT id,email FROM user_detail WHERE email=".$shrml;
		$res1=mysqli_query($con,$query1);
	}

?>
<!-- <input type="hidden" name="foldername" value="<?php echo $foldername; ?>"/> -->
<div class="container setthid">

	<div class="shrsctin" style="width:150px; float:right;height:250px; color:#a1a1a1;text-align:center;box-shadow:0px 0px 10px 0px;margin-top:0px;margin-right:10px;">
		<div class="shrbytxt"id="shrbytxt" style="font-size:30px;color:#a1a1a1;margin-left:-2px;width:150px;">Details</div>
		<!-- <div class="shrbytxt"id="shrbytxt">Shared With</div> -->
		<hr width="75%" style="border-color:blue;">
		<div class="hlddv" style="width:150px;">
			<div class="createdon" id="createdon" style="width:50px;height:15px;font-size:10px;float:left;margin-top:10px;margin-left:7px;font-weight:bold;">Created on:</div>
			<div class="crdate" style="font-size:10px;float:left;margin-top:11px;margin-left:1px;font-weight:bold;"><?php echo $row3['date'];?></div>
		</div><br><br>
		<div class="hlddv" style="width:150px;height:25px;">
			<div class="ownr" id="ownr" style=";width:50px;height:15px;font-size:11px;float:left;font-weight:bold;">Owner:</div>
			<div class="ownrname" id="ownrname" style="width:50px;height:15px;font-size:11px;float:left;font-weight:bold;text-transform:capitalize;"><?php echo $row5['name'];?></div>
		</div>
		<div class="hlddv" style="width:150px;background:red;">
			<div class="type" style="float:left;width:50px;height:15px;font-size:11px;font-family:verdana;font-weight:bold;">Type:</div>
			<div class="shrnt" id="shrnt" style="float:left;width:80px;height:15px;margin-top:1px;font-size:10px;font-family:verdana;font-weight:bold;margin-left:-2px;">Cloud Storage</div>
		</div>
	</div>
	<div class="setthid" style="width:1000px;height:1000px;;margin-left:auto;margin-right:auto;box-shadow:0px 0px 10px;background:#fff;">
		<div class="setthid" style="overflow:none;width:1000px;height:160px;background:#004d40;padding:0px 0px 10px;box-shadow:0px 0px 10px;">
			<div class="fldstrt" style="width:195px; height:150;float:left;margin:20px 10px;">
				<img src="img/folder1.png" width=175px height=130px/>
			</div>
			<div class="txthld" style="width:400px;height:100px;float:left;margin:25px 0px 0px 90px;font-family:verdana;font-size:60px;color:#fff;text-align:center;"><?php echo $foldername; ?></div>
		</div>

		<div style="width:1000px;height:0px;margin-top:0px;" class="menu_contain">
			<input type="hidden" value="<?php echo $foldername; ?>" id="hdtxt"/>
			<div class="menu3"><img class="menu_icon" src="img/share.png"/></div>
			<div class="menu2"><img class="trash_icon" src="img/trash.png"/></div>
			<div class="menu1" id="menu1"><img class="menu_icon" src="img/aa.png"/></div>
		</div>

		<div class="mainholder" style="width:940; height:auto;margin:5px 5px 5px 10px;float:left;">
			<?php
				while($row2=mysqli_fetch_assoc($res2))
				{
					$pic = $row2['pic_name'];
					$fdname = $row2['foldername']; 
					echo"<div class='imgholder1 abcd'style='width:250px;height:250px;float:left;margin-left:10px;margin-top:10px;box-shadow:0px 0px 10px 0px black;'>";
						echo"<div class='imgholder2 abcd' style='width:250px;height:250px;margin:auto;overflow:hidden;z-index:3'>";
						echo "<img alt='imgThumb1'class='folderimg abcd' id='folderimg{$row2['id']}'src='uploads/{$row2['pic_name']}' onclick='showImage({$row2['id']})'/>";
						echo"</div>";
						echo"<div class='imghiddenwrapper'>";
							echo"<div class='pic_action'id='upicon'>";
								echo"<img src='img/upload.png' class='icon' id='upicon{$row2['id']}' onclick='showImage1({$row2['id']});'/>";
							echo"</div>";
							echo"<div class='pic_action'>";
								echo"<input type='image' src='img/download.png' class='icon'/>";
							echo"</div>";
								echo"<div class='pic_action' style='border:none'>";
									echo"<input type='hidden' value='{$row2['id']}' id='picid' name='picid'/>";
									echo"<input type='image' src='img/dlfl.png' class='delete_action' onclick='deleteFolderPic({$row2['id']});'/>";
									echo"<input type='hidden' value='{$row2['foldername']}' id='folderid' name='folderid'/>";
								echo"</div>";
						echo"</div>";
					echo"</div>";
				}
			?>
		</div>
	</div>
	 <div class="slidepg1">
		<div class="upmain">
			<div class="upldpg">Upload</div>
			<div class="upcontent">
				<div class="captxt">Add Caption</div>
				<form action = "uploadfolderpic.php" method="post">
					<div class="capdiv">
						<textarea class="capbox"type="textarea" id="capbox" name="capbox" placeholder="Enter Caption Here" maxlength=150></textarea> 
					</div>
					<div class="upbtn">
						<div class="upimg" >
							<img id="upimg1" src="" alt=" Your Image preview will appear here" width=400px height=300px/>
						</div>
					</div>
					<input type='hidden' value='' id='folderpicid' nmae='folderpicid'/>
					<input type='hidden' id='folderpicnm' name='folderpicnm'/>
					<div class="holddiv">
						<div class="hld" style="width:150px; height:24.5px; float:left;margin-left:100px;">
							<div class="cnclbtn">
								<input class="btn3" type="button" id="cnclbtn" name="cnclbtn" value="Cancel" onclick=""/>
							</div>
							<div class="upldbtn1" style="float:left; ">
								<input class="btn1"type="submit" id="submitpic" name="submitpic" value="Upload">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> 
</div>
 