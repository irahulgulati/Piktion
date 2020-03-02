function shareFolder(){
		shrtxt = $('#shrtxt').val();
        fdname=$('#hdtxt').val();

    $.ajax({
       type: "POST",
        url: "sharefolder.php",
        data: {shrtxt:shrtxt,
              fdname:fdname},
        dataType: "text",
        success: function(data) {
            //alert(data);
            dt=data.split("/");
            d=dt[0];
            d1=dt[1];
            d2=dt[2];
            $("#shrtxt").hide();
            $(".share_actions").hide();
            $('.shared_msg').fadeIn(500);
            $(".done_action").fadeIn(500);
            // fetchuser(d,d1);
        }
    });
}