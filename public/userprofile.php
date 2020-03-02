<?php 

	require_once('../includes/main_functions.php');
	require_once('../includes/addMemberFunction.php');
	require_once('morecomments.php');
	if(!isset($_SESSION['uid'])) redirectTo('index.php');
				$user_id =$_GET['userid'];
				$query2="SELECT * FROM user_detail where id=$user_id";
				$res1=mysqli_query($con,$query2);
				$row1=mysqli_fetch_assoc($res1);
				$shrquery="SELECT * FROM user_detail WHERE id=".$user_id;
				$shres=mysqli_query($con,$shrquery);
				$shrow=mysqli_fetch_assoc($shres);
				if($shrow['active']==1)
				{
					$ud=$shrow['id'];
					$query9="SELECT foldername,userid,date FROM folder WHERE userid = $ud UNION SELECT foldername,userid,date FROM notify_folder WHERE userid = $ud";
					$res2=mysqli_query($con,$query9);

				}
				elseif($shrow['active']==0){
					$query3="SELECT foldername FROM folder WHERE userid=".$user_id ;
						$res2=mysqli_query($con,$query3);
				}							
?>

	<div class="container setthid">
		<div class="profilepage setthid">
			<!-- Cover Image Form Starts here -->
			<form action="uploadcvr.php" id="uploadcvrForm" enctype="multipart/form-data" method="post">
				<?php
					if($row1['coverimg']=="")
					{

						echo"<div class='cvrimg setthid'>";
							echo"<div class='cvres'>(1000*300) </div>";
							echo"<div class='cvrtxt'>Your Cover Photo Is Just One-Click Away </div>";
							
						echo"</div>";
					}
					else{
							
						echo"<div class='cvrimg setthid' >";
							echo"<img id='cvrpic' src='uploads/{$row1['coverimg']}' width=100%;/>";
							
						echo"</div>";
					}
				?>
			</form>
					<!-- cover image form ends here -->

					<!-- About section starts here -->

			<div class="userinfo setthid">
				<div class="usrname setthid" style="text-transform:capitalize;"><?php echo $row1['name']; ?></div>
				<input type="hidden" id="hid" name="hid" value="<?php echo $row1['id']; ?>"/>
				<div class="profession setthid" style="text-transform:capitalize;"><?php echo $row1['profession'];?></div>
			</div>
					<!-- About section ends here -->					
					
					<!-- profile photo sections starts here -->
			<form action="uploaddp.php" id="uploadForm" enctype="multipart/form-data" method="post">
				<?php
					
						echo"<div class='profpic setthid' >";
							echo"<img src='uploads/{$row1['displaypic']}' width=100% height=100%/>";
							
						echo"</div>";
					
				?>
			</form>
						<!-- profile photo sections ends here -->
			<hr color=#e0e0e0> 

						<!-- folder section starts here -->
			<?php 
				if($row3=mysqli_fetch_assoc($res2))
				{
					echo"<div class='fdiv' style=' width:1000px; height:220px; ''>";
					
					echo"<div class='arw1' style='height:180px; width:70px; float:left;'>";echo"<img src='img/bkarw.png' height='60px' width='60px' style='margin-top:80px; margin-left:8'>";
					echo"</div>";
					echo"<div class='finrdiv' style='width:860px;height:200px;float:left;overflow:hidden;'>";
					echo"<div class='finrdiv2' style='width:1720px;height:195px;'>";
					do {
						echo "<a href='frontindex.php?pageName=folder&foldername={$row3['foldername']}' style='text-decoration:none;color:#000;'>";
						echo"<div class='fldstrt' style='background:#fff; width:195px; height:150; float:left;margin:15px 10px;'>";
						echo"<div style='width:2px; height:30px;background:#000;float:left;'>";
						echo"</div>";
						echo"<div style='width:40px; height:2px;background:#000;float:left;'>";
						echo"</div>";
						echo "<div style='width:2px; height:47px;background:#000;transform:rotate(-50deg);transform-origin:21px -42px; '>";
						echo"</div>";
							echo"<div class='foldshw' style='background:#fff; width:180px;height:115px;border:2px solid #000;border-top:none;margin-top:-17px;box-shadow:0px 10px 10px 0px;'>";
							echo"<div style='width:107px; height:2px;background:#000;margin-left:74px;'>";
							echo"</div>";
							echo"<div class='img1' style='height:40px;width:40px;margin:13px 0px 0px 15px;background:#090f0f;float:left;box-shadow:0px 10px 10px 0px;'>";
							echo"</div>";
								echo"<div class='img1' style='height:40px;width:40px;margin:13px 0px 0px 15px;background:#090f0f;float:left; box-shadow:0px 10px 10px 0px;'>";
								echo"</div>";
								echo"<div class='img1' style='height:40px;width:40px;margin:13px 0px 0px 15px;background:#090f0f;float:left; box-shadow:0px 10px 10px 0px;'>";
								echo"</div>";
								echo"<div class='img1' style='height:40px;width:40px;margin:10px 0px 0px 15px;background:#090f0f;float:left; box-shadow:0px 10px 10px 0px;'>";
								echo"</div>";
								echo"<div class='img1' style='height:40px;width:40px;margin:10px 0px 0px 15px;background:#090f0f;float:left; box-shadow:0px 10px 10px 0px;'>";
								echo"</div>";
								echo"<div class='img1' style='height:40px;width:40px;margin:10px 0px 0px 15px;background:#090f0f;float:left; box-shadow:0px 10px 10px 0px;'>";
								echo"</div>";
							echo"</div>";
							echo"<div class='fldlbl' style='width:80px; height:30px;  text-align:center;margin:15px 0px 0px 60px;font-family:verdana;font-weight:bold;'>";
							echo"<label> {$row3['foldername']}";
							echo"</label>";
							echo"</div>";
							echo"</div>";
							
							echo"</a>";
					}while($row3=mysqli_fetch_assoc($res2));
					echo"</div>";
					echo"</div>";
					echo"<div class='arw2' style='height:180px; width:70px; float:right; '>
						<img src='img/fdarw.png' height='60px' width='60px' style='margin-top:80px;'>";
					echo"</div>";
				echo"</div>";
			}
			else{
				echo"<div class='fdiv' style=' width:1000px; height:220px;'>";
				echo"<img src='img/rg1.png'>";
				echo"</div>";
			}
		?>
				<!-- folder section ends here -->
			<hr color=#e0e0e0> 
			<div class="timeline">
				Activity
			</div>
	<div class="usercontent setthid">
									
				<!-- timeline starts here -->
		
	<?php
		$post_per_page = 2;
		$page = 1;
		$query1 = "SELECT * FROM picdetail where userid= $user_id ORDER BY id DESC";
		$res=mysqli_query($con,$query1);
		$num = mysqli_num_rows($res);
		$total_groups = ceil($num/$post_per_page);
		$page_position = ($page - 1)*$post_per_page;
		$query = "SELECT * FROM picdetail where userid= $user_id ORDER BY id DESC LIMIT $page_position,$post_per_page";
		$timeline_res = mysqli_query($con,$query);
		$num_post = mysqli_num_rows($timeline_res);
		if($num_post)
		{
				while($row=mysqli_fetch_assoc($timeline_res))
				{
						echo "<div style=\"width:500px;height:auto;margin:auto;\">";
								echo "<div class=\"img_wraper setthid\">";
								echo "<div class=\"caption setthid\">{$row['caption']}</div>";
								echo "<div class=\"image\" id='{$row['id']}'>";
								echo "<img src='uploads/{$row['picname']}' width =450px/>"; 
								echo "</div>";
								echo "<div class=\"count\" style=\"width:200px;height:15px;float:left;\">";
								echo "<div class=\"yay_count\" style=\"margin:0px 5px;height:15px;float:left;font-size:12px;\">{$row['likes']}-Yay</div>";
								echo "<div class=\"cmnt_count\" style=\"margin:0px 5px;float:left;height:15px;font-size:12px;\">{$row['dislikes']}-nay</div>";
								echo "</div>";
								echo "<div class='report' id='report{$row['id']}'onclick='clicked({$row['id']});'>Report</div>";
								echo "<hr class=\"line\" align=\"center\" color=\"black\" width=95%>";
								echo "<div class=\"activitybox  setthid\">";
								echo "<form action='like.php' method='post' id='lykform'>";
								echo "<input type='hidden' name='hidpicid' id='hidpicid' value='{$row['id']}'/>";
								echo "<div class=\"actbtn\"><input class=\"clkbtn\" type=\"submit\" name=\"likebtn\" id=\"likebtn\" value=\"Yay!!\"/></div>";
						
										
								echo "<div class=\"actbtn\"><input class=\"clkbtn\" type=\"submit\" name=\"dislikebtn\" id=\"dislikebtn\" value=\"Nay!!\"/></div>";
								
										echo "<div class=\"rightactbox  setthid\">";
										if($_SESSION['uid']==$row['userid'])
										{
											echo "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"{$row['id']}\"/>";	
											echo "<div class=\"rightactbtn\"><input class=\"rytbtn dltpic\" type=\"button\" name=\"dltbtn\" id=\"dltbtn\" value=\"Delete\"/></div>";
										}
										echo "<div class=\"rightactbtn\"><input class=\"rytbtn\" type=\"button\" name=\"sharetbtn\" id=\"sharebtn\" value=\"Share\"/></div>";
										echo"<div class=\"rightactbtn\"><input class=\"rytbtn cmnt\" type=\"button\" name=\"cmntbtn\" id=\"cmntbtn\" value=\"Comment\" onclick =\"showcmt({$row['id']})\"/></div>";
										echo"</div>";
										echo"</form>";
									echo"</div>";
									echo"<hr color=\"#fff\">";	
								echo"</div>";


					echo"<div class=\"cmntdiv\" id=\"cmntdiv{$row['id']}\"  style=\"padding-top:3px;\">";
					echo"<div class=\"writecmnt\" style=\"width:450px;height:20px;margin:5px 40px;\">";
					echo"<div class=\"cmnttext\" style=\"font-size:12px;font-family:verdana;\">Write a comment...</div>";
						echo"</div>";
							echo"<div class=\"cmntbox\">";
								echo"<div class=\"inputcmnt\">";
									echo"<textarea rows=2 cols=50 class=\"textarea\" placeholder=\"Comment Here\" id='insertcmt{$row['id']}' name='insertcmt'></textarea>";
								echo"</div>";
							
								echo"<div class=\"postbtn\">";
									echo"<input class=\"post_btn\"type=\"button\" id=\"postcmnt\" name=\"postcmnt\" value=\"Post\" onclick=\"inCom({$row['id']})\";/>";
								echo"</div>";

							echo"</div>";
							echo"<hr align='center' width=84% color=#e5e5e5>";
							echo "<div id='showcmnt_parent{$row['id']}'>";
								 include('loadcomment.php');
							echo "</div>";
							echo"<hr color=\"#fff\" align=\"center\" width=92%>";
					echo"</div>";
					echo"</div>";
					
			}

				if($num_post==$post_per_page)
				{
					$page+=1;
					echo "<div align='center' class='loadbutton' data-page=$page userid=$user_id><button class='loaduserposts'>Load More</button></div>";
				}
				else
				{
					echo "<div align='center' class='loadbutton'><button class='loaduserposts'>No More Posts</button></div>";
				}			
		}	
			else
			{
				echo"<div class=\"shwact\" style=\"width:1000px; height:500px;background:#fff; padding-top:200px;\">";
				echo "<div class=\"noact\" style= \"color:#a1a1a1; font-weight:bold; font-size:50px; text-align:center; font-family:verdana;\">Ummm!! Nothing to show ;)"; echo "</div>";
				echo "<div class=\"noact1\" style= \"color:#a1a1a1; font-weight:italic; font-size:25px; text-align:center; font-family:verdana;\">You haven't posted anything yet!"; echo "</div>";
				echo "</div>";
			}
	?>
	</div>
						<hr width=70% color="#fff">
									


	</div>
		<!-- uploaded photos section ends here -->
		<!-- upload button starts here -->
	<div class="uploadbtn">
		<div class="me">+</div>
		<input type="button" id="updialog"	name="updialog" value="+"/>								
	</div>
		<!-- upload buttons ends here -->
	</div>
						