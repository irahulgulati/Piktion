<?php 
	require_once('../includes/main_functions.php');

if(!isset($_SESSION['uid'])) redirectTo('index.php');
	$query2="SELECT coverimg,displaypic,password FROM user_detail where id='{$_SESSION['uid']}'";
				$res1=mysqli_query($con,$query2);
				$row1=mysqli_fetch_assoc($res1);
?>	
				

						<div class="container setthid">
							<div class="profilepage setthid">
							<!-- Cover Image Form Starts here -->
							<form action="uploadcvr.php" id="uploadForm" enctype="multipart/form-data" method="post">
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
								echo"<div class='me1'>+";
								echo"</div>";
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
								echo"<div class='me1'>+";
								echo"</div>";
								echo"</div>";
								
								echo"</div>";
							}
								?>
								</form>
									<!-- About section starts here -->

								<div class="userinfo setthid">

										<div class="usrname setthid" style="text-transform:capitalize;"><?php echo $_SESSION['uname']; ?></div>
										<input type="hidden" class="hidden" id="hidval" name="hidval" value="<?php echo $_SESSION['uid'];?>"/>
										<div class="profession setthid" style="text-transform:capitalize;"><?php echo $_SESSION['uprofession'];?></div>
										<!-- <div class="followbtn">
										<input class="flowbtn" type="submit" name="flowbtn" id="flowbtn" value="Follow">	
										</div> -->
									
										<!-- <div class="disflow" style="margin-top:10px;">
											 <?php echo $_SESSION['uflow'];?>followers
										</div>	 -->
									</div>
									<form action="uploaddp.php" id="uploadForm" enctype="multipart/form-data" method="post">
								<?php
								if($row1['displaypic']=="")
								{
									if($_SESSION['ugndr']=="Male")
									{

									echo"<div class='profpic setthid'>";
									echo"<img src='img/dmyml.png'/>";
										echo"<div class='addp_wrap'>
											<div class='addp'>
												<img src='img/aa.png' width=30px height=30px />
												<input type='file' name='uploaddp' style='width:20px;height:40px;margin-top:-25px;opacity:0;' onchange='this.form.submit()'>
											</div>
										</div>";
										echo"<div class='uploadbtn2'>";
											echo"<div class='me2' id='me2'>+";
											echo"</div>";
										echo"</div>";
										
									echo"</div>";
								}
									else if($_SESSION['ugndr']=="Female") {
										echo"<div class='profpic setthid'>";
										echo"<img src='img/dmyfml.png'/>";
										echo"<div class='addp_wrap'>
											<div class='addp'>
												<img src='img/aa.png' width=30px height=30px />
												<input type='file' name='uploaddp' style='width:20px;height:40px;margin-top:-25px;opacity:0;' onchange='this.form.submit()'>
											</div>
										</div>";
										echo"<div class='uploadbtn2'>";
											echo"<div class='me2' id='me2'>+";
											echo"</div>";
										
										
									echo"</div>";
										
									echo"</div>";

									}
								}
								else {
									echo"<div class='profpic setthid' >";
									echo"<img src='uploads/{$row1['displaypic']}' width=100% height=100%/>";
									echo"<div class='addp_wrap'>
											<div class='addp'>
												<img src='img/aa.png' width=30px height=30px />
												<input type='file' name='uploaddp' style='width:20px;height:40px;margin-top:-25px;opacity:0;' onchange='this.form.submit()'>
											</div>
										</div>";
										echo"<a href='dpdlt.php?dpname={$row1['displaypic']}'>";
										echo"<div class='rmvdp_wrap'>
											<div class='rmvdp'><img id='dltcvr' name='dltcvr' src='img/close.png' width=35px height=35px/></div>
										</div>";
										echo"</a>";
										echo"<div class='uploadbtn2'>";
											echo"<div class='me2' id='me2'>+";
											echo"</div>";
									echo"</div>";
										
									echo"</div>";
								}
									?>
									</form>
									<hr>
									<div class="editprof setthid">
										<div class="editpg">
											Edit Profile
										</div>
										<div style="width:350px;height:350px;float:left;margin-top:20px;margin-left:120px;">
											
										<div class="row_wrap setthid">
											<div style="width:350px;height:25px;background: #506f86;"><div id="profilemsg"style="width:350px;height:25px;color:#fff;text-align:center;font-family:verdana;font-weight:bold;"></div>
											</div>
										
								<!-- <form action="updtprofile.php" method="POST" id="upprof" class="setthid"> -->
									<div class="row" style="margin-top:10px;">
										<div class="editname">Name </div>

										<div class="editbox"><input class="inputbox" type="text" name="editname" id="editname" value="<?php echo $_SESSION['uname'];?>"/>
										</div>
										</div>
									<div class="row">
										<div class="editname">E-mail </div>
										<div class="editbox ">	<input class="inputbox" type="text" name="edml" id="edml" value="<?php echo $_SESSION['umail'];?>">
										</div>
										
									</div>
									
											<div class="row">
												<div class="editname">Contact </div>
												<div class="editbox"><input class="inputbox" type="text" name="edcon" id="edcon" value="<?php echo $_SESSION['uconi'];?>">

											</div>
											</div>
													<div class="row">
												<div class="editname">Profession </div>
												<div class="editbox"><input class="inputbox" type="text" name="edprof" id="edprof" value="<?php echo $_SESSION['uprofession'];?>">

											</div>
											</div>
													<div class="row">
												<div class="editname">Date of Birth </div>
												<div class="editbox"><input class="inputbox" type="date" name="eddb" id="eddb"/>

											</div>
											</div>
													<div class="row">
												<div class="editname">Gender </div>
												<select style="margin-left:5px;height:22px" class="slctgndr" id="edgr" name="edgr">
													<option selected>Male</option>
													<option>Female</option>
												</select>
											</div>
													<div class="btnrow">
												<div class="updtbox"><input class="updatebtn" type="button" name="updtnbtn" id="updtbtn" value="Update" onclick="updtpr();">

											</div>
											</div>
											<!-- </form> -->
											</div>
										</div>
											<div style="width:350px;height:350px;float:left;margin-left:50px;margin-top:20px;">

												<!-- <form action="updatepwd.php" id="chngpwdform" method="post" class="setthid"> -->
											<div class="row_wrap2">
												<div style="width:350px;height:25px;background: #fbb040;">
											<div id="pwdmsg"style="width:350px;height:25px;color:#fff;text-align:center;font-family:verdana;font-weight:bold;"></div>
										</div>
												<div class="row" style="margin-top:10px;">
													<div class="editname">Old Password</div>
													<div class="editbox"><input class="inputbox" type="password" name="oldpwd" id="oldpwd" placeholder='Old Password'/>
													</div>
												</div>
												<div class="row">
													<div class="editname">New Password</div>
													<div class="editbox"><input class="inputbox" type="password" name="newpwd" id="newpwd" placeholder='New Password' />
													</div>
												</div>
 												
												<div class="row">
													<div class="editname">Confirm Password</div>
													<div class="editbox" style="margin-top:5px;"><input class="inputbox" type="password" name="cnfrmpwd" id="cnfrmpwd" placeholder='Confirm Password'/>
													</div>
												</div>
												<div class="btnrow">
													<input class="chngpwd" type="button" name="updtpwd" id="updtpwd" value="Change Password"  onclick="chngpwd();"/>
												</div>
											</div>
										<!-- </form> -->
										
											<div class="row_wrap3">
												<div style="padding-top:10px;margin-left:10px;">
													<div class="editname" style="color:#fff;">Question</div>
													<div class="editbox" style="color:#fff;">What's your birth place?</div>
												</div>
												<div class="row">
													<div class="editname">Answer</div>
													<div class="editbox"><input class="inputbox" type="text" name="sectxt" id="sectxt" />
													</div>
												</div>
												<div class="btnrow">
													<input class="secquest" type="button" name="secquest" id="secquest" value="Submit" onclick="secquest();"/>
												</div>
											</div>
										
										</div>
									</div>
									</div>
									</div>
									</div>
