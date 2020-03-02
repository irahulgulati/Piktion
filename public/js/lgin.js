function lgin() 
{

username = $("#lgusrnm").val();
password = $("#lgusrpwd").val();	

if(username == "" || username.length < 1)
{
	$("#lgusrnm").addClass("animated shake");
	$("#lgusrnm").css({"border":"1px solid #f00"});
	$("#lgusrnm").click(function(){
		$("#lgusrnm").removeClass("animated shake");
		$("#lgusrnm").css({"border":"none"});
	});
}
if(password == "" || password.length < 1)
{
	$("#lgusrpwd").addClass("animated shake");
	$("#lgusrpwd").css({"border":"1px solid #f00"});
	$("#lgusrpwd").click(function(){
		$("#lgusrpwd").removeClass("animated shake");
		$("#lgusrpwd").css({"border":"none"});
	});
}
else
{
	$.ajax({
		url: 'public/lguser.php',
		type: 'POST',
		dataType: 'text',
		data: {lgusrnm:username,lgusrpwd:password},
		success: function(data)
		{
			if(data == "admin")
			{
				window.location.href = "admin/index.php";
			}
			else if(data == "user")
			{
				window.location.href = "public/frontindex.php";
			}
			else
			{
				$('.error').html("Invalid Username or Password");
			}
		}
	});
}
function fireForm(frm)
{   
	
	$("#"+frm).submit();

}
}