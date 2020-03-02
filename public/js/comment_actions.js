function inCom(id){
    picid = id;
		comnt = $('#insertcmt'+id).val();
  $.ajax({
    type:"POST",
    url:"loadcomment.php",
    data: {comnt: comnt,picid:picid},
    dataType: "text",
    success: function(data) {
       $('#showcmnt_parent'+picid).html(data);
       $("#insertcmt"+picid).focus().val("");
    }
  });

}

function more(page,id){
  page = page;
  picid=id;
  $.ajax({
    type: "POST",
    url: "loadcomment.php",
    data: {picid: picid,page:page},
    dataType: "text",
    success: function(data){
				$('#showcmnt_parent'+picid).html(data);
    },
	 error:function(){
	 }
  });

}
function deleteComment()
{
  values = $("#dlt_cmnt_hid").val();
    value = values.split(",");
    cmnt_id = value[0];
    pic_id = value[1];
    page = value[2];
    page_position = value[3];
  $.ajax({
    type:"POST",
    url:"loadcomment.php",
    data: {cmntid:cmnt_id,picid:pic_id,page:page,page_position:page_position},
    dataType: "text",
    success: function(data) {
             $(".deletebox_container").hide();
        $('#showcmnt_parent'+pic_id).html(data);
      }
  });

}

function editcmnt_function()
{
  id = $("#editcmnthid").val();
  
  if($('#editcmnt').val()=="")
  {
    $('.edit_container').css({"display":"none"});
  }
  else
  {
    edit_comment = $("#editcmnt").val();
    $("#Comet"+id).html(edit_comment);
    $(".edit"+id).html("Edited"); 
    $.ajax({
      type:"POST",
      url:"update_comment.php",
      data: {editcomment:edit_comment,id:id},
      dataType: "text",
      success: function()
      {
        $('.edit_container').css({"display":"none"});
      }
    });
  }
}