<?php
		require_once('../includes/main_functions.php');
		

?>
<html>
	
	<head>
			<title>Welcome to Piktion</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/checkmail.js"></script>
	</head>
		<body>
				<form action="insertMail.php" method="post" id="fgt">
					<div class="fgtwrap" >
						
						<div class="fgtgraph">
							<h1 style="font-family:verdana;font-weight:bold; font-size:35px; color:#fff;">Forgot Your Password!</h1>
								<p style="font-family:verdana;font-size:15px;color:#fff;">
								Well, dont worry. Just enter your registered email here. We'll be sending you a new password shortly.

									</p>
						</div>
						
						<div class="adminlogin">
						<div class="addlogo" style="padding-top:30px;">
					<div style="width:150px;height:150px;margin:auto;">
						<img src="img/naam.png" width=150 height=150/>
					</div>
				</div>
				<div class="logoname">
				<div class="textlogo" ><h>PIKTION</h></div>
				</div>
							<div class="wor">
								<hr color:grey>
								<label style="font-family:verdana;font-weight:bold; margin-left:55px; color:#ff0000;">Reset Your Password</label>
								
								<input class="x" type="email" name="fgtml" id="fgtml" placeholder=" Enter your email here"/>
								<input class="y" type="button" name="fgtpsbtn" id="fgtpsbtn" value="Submit" onclick="checkMail();"/>
								<div class="pwd"><a  href="signAdmin.php" style="color:#ff0000;">Login</a></div>
								
					</div>



			</div>
			</div>

			</form>

		</body>




</html>