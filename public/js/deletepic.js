function deletePic()
{
	values = $("#dlt_pic_hid").val();
    value = values.split(",");
    pic_id = value[0];
    page = value[1];
    page_position = value[2];
  $.ajax({
    type:"POST",
    url:"timeline.php",
    data: {picid:pic_id,page:page,page_position:page_position},
    dataType: "text",
    success: function(data) {
             $(".deletealert_container").hide();
        $('.content').html(data);
      }
  });
}

function dltFolderPic()
{
  values = $("#dlt_pic_hid").val();
    value = values.split(",");
    pic_id = value[0];
    foldername = value[1];
    
  $.ajax({
    type:"POST",
    url:"dltfoldpic.php",
    data: {picid:pic_id,foldername:foldername},
    dataType: "text",
    success: function(data) {
             $(".deletefolderpic_container").hide();
             $(".mainholder").html(data);
      }
  });
}