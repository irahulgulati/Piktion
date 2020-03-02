	<?php
		require_once('../includes/main_functions.php');
		require_once('morecomments.php');
		if(!isset($_SESSION['uid'])) redirectTo('index.php');
		$pic_id = $_GET['picid'];
		$query= "SELECT * FROM picdetail  where id=$pic_id group by picname,userid ORDER by id desc";
		$res=mysqli_query($con,$query);
	
	?>
				<div class="container setthid">
				<div class="containermid setthid">
						<!-- <div class="editpg">Feed</div> -->
					<?php
					$i=1;
					while($row=mysqli_fetch_assoc($res))
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
									echo "<hr class=\"line\" align=\"center\" color=\"black\" width=95%>";
									echo "<div class=\"activitybox  setthid\">";
									echo "<form action='like.php' method='post' id='lykform'>";
									echo "<input type='hidden' name='hidpicid' id='hidpicid' value='{$row['id']}'/>";
									echo "<div class=\"actbtn\"><input class=\"clkbtn\" type=\"submit\" name=\"likebtn\" id=\"likebtn\" value=\"Yay!!\"/></div>";
							
											
									echo "<div class=\"actbtn\"><input class=\"clkbtn\" type=\"submit\" name=\"dislikebtn\" id=\"dislikebtn\" value=\"Nay!!\"/></div>";
									
											echo "<div class=\"rightactbox  setthid\">";
											echo "<div class=\"rightactbtn\"><input class=\"rytbtn\" type=\"button\" name=\"sharetbtn\" id=\"sharebtn\" value=\"Share\"/></div>";
											echo"<div class=\"rightactbtn\"><input class=\"rytbtn cmnt\" type=\"button\" name=\"cmntbtn\" id=\"cmntbtn\" value=\"Comment\" onclick =\"showcmt({$row['id']})\"/></div>";
											echo"</div>";
											echo"</form>";
										echo"</div>";
										echo"<hr color=\"#fff\">";	
									echo"</div>";


						echo"<div class=\"cmntdiv\" id=\"cmntdiv{$row['id']}\"  style=\"padding-top:3px;display:block;\">";
						echo"<div class=\"writecmnt\" style=\"width:450px;height:20px;margin:5px 40px;\">";
						echo"<div class=\"cmnttext\" style=\"font-size:12px;font-family:verdana;\">Write a comment...</div>";
							echo"</div>";
								echo"<div class=\"cmntbox\">";
									echo"<div class=\"inputcmnt\">";
										echo"<textarea rows=2 cols=50 class=\"textarea\" placeholder=\"Comment Here\" id='insertcmt{$row['id']}' name='insertcmt'></textarea>";
									echo"</div>";
									//echo"<form action=\"cmnt.php\" method=\"post\" id=\"cmntform\">";
									echo"<div class=\"postbtn\">";
										echo"<input class=\"post_btn\"type=\"button\" id=\"postcmnt\" name=\"postcmnt\" value=\"Post\" onclick=\"inCom({$row['id']})\";/>";
									echo"</div>";

								echo"</div>";
								echo"<hr align='center' width=84% color=#e5e5e5>";
								// echo"<input type='button' style='margin-left:48px' value='View More Comments' onclick='more({$row['id']});'";
								// echo"<hr color=\"#e5e5e5\" align=\"center\" width=87%>";
								echo "<div id='showcmnt_parent{$row['id']}'>";
						 			include('loadcomment.php');
								echo "</div>";
									echo"<hr color=\"#fff\" align=\"center\" width=92%>";
						echo"</div>";
						echo"</div>";
						
									
				}
	?>
		<hr width=70% color="#fff">
	</div>

						
		<!-- upload button starts here -->
					<div class="uploadbtn">
					<div class="me">+</div>
						<input type="button" id="updialog"	name="updialog" value="+"/>								
					</div>

</div>
	