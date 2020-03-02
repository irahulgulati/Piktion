function secquest()
{
	sectxt = $("#sectxt").val();
	
	if(sectxt =="")
	{
		$("#sectxt").addClass("animated shake");
		$("#sectxt").css({"border":"1px solid red"});
		$("#sectxt").click(function(){
			$("#sectxt").removeClass("animated shake");
			$("#sectxt").css({"border":""});
		});
	}
	else 
	{
	$.ajax({
   type: "POST",
    url: "updatesec.php",
    data: {shrtxt:sectxt,
    	
          },
    dataType: "text",
    success: function(data) {
 		$('#pwdmsg').css("background","#f00");

        $('#pwdmsg').html(data);
        $('#pwdmsg').fadeOut(2500);

    }
});
	}
}