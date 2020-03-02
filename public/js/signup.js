function sinup()
{
	sgnname=$("#sgnname").val();
	sgnemail=$("#sgnemail").val();
	sgnpwd=$("#sgnpwd").val();
	sgncnt=$("#sgncnt").val();
	sgndob =$("#sgndob").val();
	sgngndr =$("#sgngndr").val();	
	if(sgnname == "" || sgnname.length <=1)
	{
		$("#sgnname").addClass("animated shake");
		$("#sgnname").css({"border":"1px solid #f00"});
		$("#sgnname").click(function(){
			$("#sgnname").removeClass("animated shake");
			$("#sgnname").css({"border":"1px solid #bbb"});
		});
	}
	if(sgnemail == "" || sgnemail.length < 1)
	{
		$("#sgnemail").addClass("animated shake");
		$("#sgnemail").css({"border":"1px solid #f00"});
		$("#sgnemail").click(function(){
			$("#sgnemail").removeClass("animated shake");
			$("#sgnemail").css({"border":"1px solid #bbb"});
		});
		
	}
	if(sgnpwd== "") 
	{
		$("#sgnpwd").addClass("animated shake");
		$("#sgnpwd").css({"border":"1px solid #f00"});
		$("#sgnpwd").click(function(){
			$("#sgnpwd").removeClass("animated shake");
			$("#sgnpwd").css({"border":"1px solid #bbb"});
		});
		
	}
	if(sgncnt == "" || sgncnt.length < 1)
	{
		$("#sgncnt").addClass("animated shake");
		$("#sgncnt").css({"border":"1px solid #f00"});
		$("#sgncnt").click(function(){
			$("#sgncnt").removeClass("animated shake");
			$("#sgncnt").css({"border":"1px solid #bbb"});
		});
		
	}
	if(sgndob == "" || sgndob.length <=1)
	{
		$("#sgndob").addClass("animated shake");
		$("#sgndob").css({"border":"1px solid #f00"});
		$("#sgndob").click(function(){
			$("#sgndob").removeClass("animated shake");
			$("#sgndob").css({"border":"1px solid #bbb"});
		});
	}
	if(sgngndr == "" || sgngndr.length <=1)
	{
		$("#sgngndr").addClass("animated shake");
		$("#sgngndr").css({"border":"1px solid #f00"});
		$("#sgngndr").click(function(){
			$("#sgngndr").removeClass("animated shake");
			$("#sgngndr").css({"border":"1px solid #bbb"});
		});
	}
	if(sgnpwd.length <=5)
	{
		alert("Password must be greater than 5 character!!");
	}
	else 
	{
		v1=validateEmail(sgnemail);
		if(v1 ==  true)
		{
			$.ajax({
  		 	type: "POST",
    		url: "public/snuser.php",
   			 data: {sgnname:sgnname,
    					sgnemail:sgnemail,
    					sgnpwd:sgnpwd,
    					sgncnt:sgncnt,
    					sgndob:sgndob,
    					sgngndr:sgngndr
    				},
    		dataType: "text",
   	 		success: function(data) {
   	 					if(data)
   	 					{
   	 						alert(data);
   	 						window.location.href = 'index.php'
   	 					}
   	 					else
   	 					{
   	 						alert("Email id already exists!!");
   	 						$("#sgnemail").focus().val("");
   	 					}
    		}
			});
		}
		else
		{
			alert('Email is incorrect');
			$("#sgnemail").focus();
		}
	}

	function validateEmail(email)
	{
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");
		if (atpos < 1 || dotpos<atpos+2 || dotpos+2 >= email.length) {
			return false;
		}
		else{
			return true;
		}
	}

}