function updtpr()
{
			

	ename=$("#editname").val();

	email=$("#edml").val();

	econ=$("#edcon").val();

	prof=$("#edprof").val();

	dob=$("#eddb").val();
	gndr=$("#edgr").val();
	
	if(ename == "" || ename.length < 1)
	{
		$("#editname").addClass("animated shake");
		$("#editname").css({"border":"1px solid #f00"});
		$("#editname").click(function(){
			$("#editname").removeClass("animated shake");
			$("#editname").css({"border":"none"});
		});
	}
	if(email == "" || email.length < 1)
	{
		$("#edml").addClass("animated shake");
		$("#edml").css({"border":"1px solid #f00"});
		$("#edml").click(function(){
			$("#edml").removeClass("animated shake");
			$("#edml").css({"border":"none"});
		});
		
	}
	if(econ == "" || econ.length < 1)
	{
		$("#edcon").addClass("animated shake");
		$("#edcon").css({"border":"1px solid #f00"});
		$("#edcon").click(function(){
			$("#edcon").removeClass("animated shake");
			$("#edcon").css({"border":"none"});
		});
		
	}
	if(prof == "" || prof.length < 1)
	{
		$("#edprof").addClass("animated shake");
		$("#edprof").css({"border":"1px solid #f00"});
		$("#edprof").click(function(){
			$("#edprof").removeClass("animated shake");
			$("#edprof").css({"border":"none"});
		});
		
	}
	else 
	{
		v1=validateEmail(email);
		if(v1 ==  true)
		{
			
			$.ajax({
  		 	type: "POST",
    		url: "updtprofile.php",
   			 data: {editname:ename,
    					edml:email,
    					edcon:econ,
    					edprof:prof,
    					eddb:dob,
    					edgr:gndr
          		},
    		dataType: "text",
   	 		success: function(data) {
 			$('#profilemsg').css("background","#f00");

        		$('#profilemsg').html(data);
       		 	$('#profilemsg').fadeOut(2500);

    		}
			});
		}
		else 
		{
			alert('email is incorrect');
			window.location='frontindex.php?pageName=editpage';
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

