<html>
<?php 
	session_start();
	if(isset($_SESSION['uname'])) {
		header('location:public/frontindex.php');
	
	}
 ?>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="public/css/style1.css">
		<script type="text/javascript" src="public/js/jquery.js"></script>
		<script type="text/javascript" src="public/js/lgin.js"></script>
		<script type="text/javascript" src="public/js/signup.js"></script>
		<link rel="stylesheet" type="text/css" href="public/css/animate.css">
		<link rel="stylesheet" type="text/css" href="public/css/responsive.css">
		<script>
		$("document").ready(function(){
			$(".signup").click(function(){
			$(".sign_wrap").css({"margin-top":'-480px'})
			});
			$(".login_top").click(function(){
			$(".sign_wrap").css({"margin-top":'0px'})
			});
		});
	function searchKeyPress(e)
    {
        // look for window.event in case event isn't passed in
        e = e || window.event;
        if (e.keyCode == 13)
        {
            document.getElementById('login').click();
            return false;
        }
        return true;
    }
	</script>
		<style type="text/css">
    *{
    	margin:0;
    	padding:0;
    	font:bold 12px "Lucida Grande", Arial, sans-serif;
    }
    body {
    	padding: 10px;
    }
    h1{
    	font-size:14px;
    }		
</style>
	</head>
	<body>
	
		<div class="wrapper">					
			<div class="container">
					<img class="logo" src="public/img/mlogo.png"/>
							<div class="form_wrap">
							<!-- <form action="lguser.php" method="post" id="lgid"> -->
								<div class="sign_wrap" style="width:400px;height:1150px;margin-left:auto;margin-right:auto;transition:all .5s ease-in-out;">
									<div class="login_form">

										<div class="login_wrap"><div class="login_text">Login</div></div>
											
												<div class="sign_up"><a class="signup">Sign Up</a></div>
													<div class="input_field">
														<div class="user input">
													<input class="input_name" type="text" id="lgusrnm" name="lgusrnm" placeholder=" Username" />
															</div>
												<div class="pwd input">
													<input class="input_pwd" type="password" id="lgusrpwd" name="lgusrpwd" placeholder=" Password" onkeypress="return searchKeyPress(event);"/>
												</div>
											</div>
									<div class="login_btn_wrap">
										<div class="login_btn"><input class="logbtn"type="button" id="login" name="login" value="Log In" onclick="lgin();"/></div>
									</div>
									<div class="error"></div>
									<div class="forgot_pwd"><a href="public/fgtpg.php">Forgot Password?</a></div>
								
								</div>
						<!-- </form> -->
							<!-- <form action="snuser.php" method="POST" id="sgnup"> -->
						<div class="signup_form">
							<div class="signup_wrap"><div class="signup_text">SignUp</div></div>
							<div class="input_fld">
							<div class="lab_div">
								<div class="label_nam">Name</div>
								<div class="labels">Email</div>
								<div class="labels">Password</div>
								<div class="labels">Contact</div>
							</div>	
								<div class="user input"><input type="text" id="sgnname" name="sgnname" placeholder=" Username"/></div>
								<div class="mail input"><input type="email" id="sgnemail" name="sgnemail" placeholder=" Email"/></div>
								<div class="pwd input"><input type="password" id="sgnpwd" name="sgnpwd" placeholder=" Password" /></div>
								<div class="contact input"><input type="number" id="sgncnt" name="sgncnt" placeholder=" Contact "/></div>
								<div class="birth input"><div class="dob_text">D.O.B</div></div>
								<div class="dob input"><input type="date" id="sgndob" name="sgndob"/></div>
								<div class="gender input"><div class="gender_text">Gender</div></div>
								<div class="gendr input">
									<select id="sgngndr" name="sgngndr" single>
										<option value="">Choose</option>
										<option  Value="Male">Male</option>
										<option Value="Female">Female</option>
									</select>
								</div>
							</div>
							<div class="login_top"><a href="#">Login</a></div>
							<div class="signup_div">
							<div class="signup_btn"><input class="signbtn" type="button" id="signup" name="signup" value="SIGNUP" onclick="sinup();"/></div>
							</div>
						</div>
						<!-- </form> -->
						</div>
				</div>
			</div>
			</div>
			
	</body>
</html>