function chngpwd()
{
	oldpass = $("#oldpwd").val();
	newpass = $("#newpwd").val();
	cnfrmpass = $("#cnfrmpwd").val();

	if(oldpass == "" || oldpass.length < 1)
	{
		$("#oldpwd").addClass("animated shake");
		$("#oldpwd").css({"border":"1px solid #f00"});
		$("#oldpwd").click(function(){
			$("#oldpwd").removeClass("animated shake");
			$("#oldpwd").css({"border":"none"});
		});
	}
	if(newpass == "" || newpass.length < 1)
	{ 
		$("#newpwd").addClass("animated shake");
		$("#newpwd").css({"border":"1px solid #f00"});
		$("#newpwd").click(function(){
			$("#newpwd").removeClass("animated shake");
			$("#newpwd").css({"border":"none"});
		});
	}
	if(cnfrmpass == "" || cnfrmpass.length < 1)
	{
		$("#cnfrmpwd").addClass("animated shake");
		$("#cnfrmpwd").css({"border":"1px solid #f00"});
		$("#cnfrmpwd").click(function(){
			$("#cnfrmpwd").removeClass("animated shake");
			$("#cnfrmpwd").css({"border":"none"});
		});
	}
	if(newpass != cnfrmpass)
	{
	 	$("#cnfrmpwd").addClass("animated shake");
	 	$("#cnfrmpwd").css({"border":"1px solid #f00"});
	 	// $("#cnfrmpwd").val("");
	 	$("#cnfrmpwd").click(function(){
			$("#cnfrmpwd").removeClass("animated shake");
			$("#cnfrmpwd").css({"border":"none"});
		});
	}
	else
	{
		$.ajax({
   type: "POST",
    url: "updatepwd.php",
    data: {shrtxt:newpass,
    		oldpwd:oldpass
          },
    dataType: "text",
    success: function(data) {
 		$('#pwdmsg').css("background","#f00");
 		$("#oldpwd").val("");
		$("#newpwd").val("");
		$("#cnfrmpwd").val("");
        $('#pwdmsg').html(data);
        $('#pwdmsg').fadeOut(2500);

    }
});
	}

// function fireform(frm)
// {
// 	$("#"+frm).submit();
// }
}