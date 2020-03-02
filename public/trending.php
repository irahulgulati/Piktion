<?php 
	require_once('../includes/main_functions.php');
if(!isset($_SESSION['uid'])) redirectTo('index.php');
$query= "SELECT * FROM picdetail  where likes >= 100 group by picname,userid ORDER by id desc";
	$res=mysqli_query($con,$query);
?>

				<div class="container  setthid">
					<div class="containermid  setthid">
						<div class="editpg">Trending</div>
						<?php
					$i=1;
					while($row=mysqli_fetch_assoc($res))
					{
						$report = $row['report'];
						if($report==5)
						{
							$rip = $row['id'];
							$delquery = "DELETE FROM picdetail where id=".$rip;
							$delres =  mysqli_query($con,$delquery);
						}
					else
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
											echo "<div class=\"rightactbtn\"><input class=\"rytbtn\" type=\"button\" name=\"sharetbtn\" id=\"sharebtn\" value=\"Share\"/></div>";
											echo"<div class=\"rightactbtn\"><input class=\"rytbtn cmnt\" type=\"button\" name=\"cmntbtn\" id=\"cmntbtn\" value=\"Comment\" onclick =\"showcmt({$i})\"/></div>";
											echo"</div>";
											echo"</form>";
										echo"</div>";
										echo"<hr color=\"#fff\">";	
									echo"</div>";


						echo"<div class=\"cmntdiv\" id=\"cmntdiv{$i}\"  style=\"padding-top:3px;\">";$i++;
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
								echo"<hr align='center' width=92% color=#ddd>";
								
								echo"<div class=\"showcmnt\" id='showcmnt{$row['id']}'>";
								$query1="SELECT * FROM comment where pic_id={$row['id']} order by id desc limit 1";
									$res1 = mysqli_query($con,$query1);
									$query1="SELECT * FROM comment where pic_id={$row['id']} order by id desc";
									$resnum = mysqli_query($con,$query1);
									$num = mysqli_num_rows($resnum);
									while($row1=mysqli_fetch_assoc($res1))
									{
								
										echo"<div class=\"user_name\">{$_SESSION['uname']}</div>";
										echo"<div class='comment' id='Comet{$row['id']}'>{$row1['description']}</div>";
										echo"<div class=\"cmntedit\">";
										echo"<div class=\"edit\"><a href=\"#\">Edit</a></div>";
										echo"<div class=\"delete\"><a href=\"#\">Delete</a></div>";
										echo"<div class=\"time\">{$row1['date']}</div>";
										echo"</div>";
									}
							echo"</div>";
							echo"<hr color=\"#e5e5e5\" align=\"center\" width=87%>";
							if($num>3)
									{
										echo"<input type='button' style='margin-left:48px' value='View More Comments' onclick='more({$row['id']});'";
										echo"<hr color=\"#e5e5e5\" align=\"center\" width=87%>";
									}
						echo"</div>";
						echo"</div>";
						
					}				
				}
?>
						<hr width=70% color="#fff">
					</div>
				
						<!-- upload button starts here -->
									<div class="uploadbtn">
									<div class="me">+</div>
										<input type="file" name="uploadfile" id="uploadfile" value="+" onclick="#">
									</div>

				</div>
	