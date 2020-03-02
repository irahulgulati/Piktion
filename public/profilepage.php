<?php 

	require_once('../includes/main_functions.php');
	require_once('../includes/addMemberFunction.php');
	require_once('morecomments.php');
	if(!isset($_SESSION['uid'])) redirectTo('index.php');
		 // $query1 = "SELECT * FROM picdetail where userid='{$_SESSION['uid']}' ORDER BY id DESC";
			// 	$res=mysqli_query($con,$query1);
			// 	$num_pics = mysqli_num_rows($res);
				$query2="SELECT coverimg,displaypic FROM user_detail where id='{$_SESSION['uid']}'";
				$res1=mysqli_query($con,$query2);
				$row1=mysqli_fetch_assoc($res1);
				$shrquery="SELECT * FROM user_detail WHERE id=".$_SESSION['uid'];
				$shres=mysqli_query($con,$shrquery);
				$shrow=mysqli_fetch_assoc($shres);
				if($shrow['active']==1)
				{
					$ud=$shrow['id'];
					$query9="SELECT foldername,userid,date FROM folder WHERE userid = $ud UNION SELECT foldername,userid,date FROM notify_folder WHERE userid = $ud";
					$res2=mysqli_query($con,$query9);
					$num = mysqli_num_rows($res2);

				}
				elseif($shrow['active']==0){
					$query3="SELECT foldername FROM folder WHERE userid=".$_SESSION['uid'] ;
						$res2=mysqli_query($con,$query3);
						$num = mysqli_num_rows($res2);
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
							echo"<div style='width:120px;height:100px;float:left;margin-top:170px;overflow:hidden;'>";
								echo"<div class='twodiv' style='width:30px;height:30px;margin-left:120px;'>
									<div>
										<img src='img/aa.png' width=30px height=30px style='padding-bottom:8px;'/>
									</div>
									<input type='file' name='uploadcvr' style='width:20px;height:30px;margin-top:-35px;opacity:0;' onchange='this.form.submit()'>";
								echo"</div>";
							echo"</div>";
							echo "<div class='uploadbtn1'>";
								echo"<div class='me1'>+</div>";
							echo"</div>";
						echo"</div>";
					}
					else{
							
						echo"<div class='cvrimg setthid' >";
							echo"<img id='cvrpic' src='uploads/{$row1['coverimg']}' width=100%;/>";
							echo"<div style='width:120px;height:70px;float:right;margin-top:-140px;z-index:1;position:relative;'>";
								echo"<div class='threediv' style='width:30px;height:70px;margin-left:120px;'>
									<img src='img/aa.png' width=30px height=30px />
									<input type='file' name='uploadcvr' style='width:20px;height:40px;margin-top:-30px;opacity:0;' onchange='this.form.submit()'>
									<a href='dltcvr.php?cvrname={$row1['coverimg']}'><img id='dltcvr' name='dltcvr' src='img/close.png' width=32px height=32px/></a>";
								echo"</div>";
							echo"</div>";
							echo "<div class='uploadbtn1'>";
								echo"<div class='me1'>+</div>";
							echo"</div>";
						echo"</div>";
					}
				?>
			</form>
					<!-- cover image form ends here -->

					<!-- About section starts here -->

			<div class="userinfo setthid">
				<div class="usrname setthid" style="text-transform:capitalize;"><?php echo $_SESSION['uname']; ?></div>
				<input type="hidden" id="hid" name="hid" value="<?php echo $_SESSION['uid']; ?>"/>
				<div class="profession setthid" style="text-transform:capitalize;"><?php echo $_SESSION['uprofession'];?></div>
			</div>
					<!-- About section ends here -->					
					
					<!-- profile photo sections starts here -->
			<form action="uploaddp.php" id="uploadForm" enctype="multipart/form-data" method="post">
				<?php
					
						echo"<div class='profpic setthid' >";
							echo"<img src='uploads/{$row1['displaypic']}' width=100% height=100%/>";
							echo"<div class='addp_wrap'>
								<div class='addp'>
									<img src='img/aa.png' width=30px height=30px />
									<input type='file' name='uploaddp' style='width:20px;height:40px;margin-top:-25px;opacity:0;' onchange='this.form.submit()'>
								</div>
							</div>";
							if($row1['displaypic']!="dmyfml.png" && $row1['displaypic']!="dmyml.png")
							{
								echo"<a href='dpdlt.php?dpname={$row1['displaypic']}'>";
									echo"<div class='rmvdp_wrap'>
										<div class='rmvdp'><img id='dltcvr' name='dltcvr' src='img/close.png' width=35px height=35px/></div>
									</div>";
								echo"</a>";
							}
							echo"<div class='uploadbtn2'>";
								echo"<div class='me2' id='me2'>+</div>";
							echo"</div>";
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
					
					echo"<div class='arw1' style='height:180px; width:70px; float:left;'>";
						echo"<img src='img/bkarw.png' class='backward_arrow'>";
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
					
					
						echo"<div class='arw2' style='height:180px; width:70px; float:right; '>";
						if($num>1)
						{
							echo"<img src='img/fdarw.png' class='forward_arrow'>";
						}
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
		<!-- timeline starts here -->
	<div class="content setthid">
			
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
	
								
