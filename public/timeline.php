<?php
	require_once('../includes/main_functions.php');
	require_once('morecomments.php');
?>
<?php

	$post_per_page = 2;
		if(isset($_POST['picid']))
		{
			$page = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
			$page_limit = filter_var($_POST["page_position"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
			$picid = $_POST['picid'];
			$qry = "SELECT picname FROM picdetail where id = $picid ";
			$rs = mysqli_query($con,$qry);
			$rw = mysqli_fetch_assoc($rs);
			$picname = $rw['picname'];
			$delpic_query = "DELETE FROM picdetail where id = $picid ";
			$delpic_res = mysqli_query($con,$delpic_query); 
			unlink("uploads/".$rw['picname']);
		}
	else if(isset($_POST['page_number']))
	{
		$page = filter_var($_POST["page_number"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		$page_limit = ($page * $post_per_page);
	}
		$query= "SELECT * FROM picdetail where userid = '{$_SESSION['uid']}' ORDER by id desc limit $page_limit,$post_per_page";
		$pic_res=mysqli_query($con,$query);
		$num_post = mysqli_num_rows($pic_res);
		if($page>0 && $num_post==0)
		{
			echo "<div align='center' class='loadbutton'><button class='loadtimeline'>No More Posts</button></div>";
			exit;
		}
?>
<?php
	if($num_post)
	{
		while($row=mysqli_fetch_assoc($pic_res))
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
									echo "<div class=\"rightactbtn\"><input class=\"rytbtn dltpic\" type=\"button\" name=\"dltbtn\" id=\"dltbtn\" value=\"Delete\" onclick='deleteAlert({$row['id']},$page,$page_limit);'/></div>";
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
			echo "<div align='center' class='loadbutton'><button class='loadtimeline'>Load More</button></div>";
		}
		else
		{
			echo "<div align='center' class='loadbutton'><button class='loadtimeline'>No More Posts</button></div>";
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
