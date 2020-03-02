
<html>
<head>
<title>Forgot Your Password?</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<script>
function ChangeCaptcha() {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = 6;
	var ChangeCaptcha = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		ChangeCaptcha += chars.substring(rnum,rnum+1);
	}
	document.getElementById('randomfield').value = ChangeCaptcha;
}
function check() {
	email = document.getElementById("fgtem").value;
	alert(email);
	captcha = document.getElementById('CaptchaEnter').value;
	if(email == "")
	{
		alert("Please Enter Email");
		fgtem.focus();
		exit;
	}
	if(captcha == "")
	{
		alert("Please Enter Captcha");
		CaptchaEnter.focus();
		exit;
	}
	if(captcha != document.getElementById('randomfield').value ) 
	{
		alert('Please re-check the captcha');
		CaptchaEnter.focus();
		exit;
	}

	else
	{
		$("#pwdsend").submit();
	}

}

</script>
<script type="text/javascript" src="js/jquery.js"></script>

</head>
	
		<body onLoad="ChangeCaptcha()">
			<div class="fgtpg">
				<div class="leftdiv" style="width:65%;height:300px;float:left;margin-top:200px;">
				<div class="forgottxt">
					Forgot Your Password?
				</div>
				<div class="dontwrry">
					Well,dont worry!We are here to help!
				</div>
					</div>	
					<div class="fgtlogo"><img src="img/naam.png" width=140px height=140px/></div>			
					<div class="fgtform" style="width:30%;height:450px;float:left;margin-top:-90px;margin-right:5%;">
							<div style="margin-top:130px;margin-left:80px;font-size:25px;font-weight:bold;font-family:verdana;">Enter Your Email</div>
							<div style="margin-top:5px;margin-left:50px;font-size:18px;font-family:verdana;">We will be sending you an email</div>
									<form action="forgot.php" method="post" id="pwdsend">
										<div class="fgtinp" ><input type='text' class="inpemail" name="fgtem" id="fgtem" placeholder=" Enter Your Email"></div>	
											<div class="cap" style="width:200px; margin-left:50px; margin-top:10px"> 
												<input type="text" id="randomfield" disabled>

											</div>
												<div class="entrcap" style="margin: 10px 50px;">
													<input type='text' id="CaptchaEnter" maxlength="6" placeholder=" Enter Given Captcha" />
												</div>			
																<input type="button" id="captchabtn" name='captchabtn' value="Submit" onclick="check()"/>
												
									</form>
					</div>

	




			</div>
		</body>
</html>