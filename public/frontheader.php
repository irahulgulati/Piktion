<?php
	require_once('../includes/main_functions.php');

	if(!isset($_SESSION['uname'])&& !isset($_SESSION['token'])) redirectTo('index.php');
	$url = "front.php";
	if(isset($_GET['pageName']) && !empty($_GET['pageName']) && is_string($_GET['pageName']))
	{
		$pageName = $_GET['pageName'];
		$url = $pageName.".php";
		if(!file_exists($url)){
			$url = "front.php";
		}
	}
	$img_query="SELECT coverimg,displaypic FROM user_detail where id='{$_SESSION['uid']}'";
				$img_res=mysqli_query($con,$img_query);
				$img_row=mysqli_fetch_assoc($img_res);
				$query3="SELECT foldername FROM folder WHERE userid=".$_SESSION['uid'];
				$res3=mysqli_query($con,$query3);
				// $row3=mysqli_fetch_assoc($res3);

?>
<html>
	<head>
		<title>Welcome to Piktion</title>
				<link rel="shortcut icon" href="img/favicon.ico" />

			<link rel="stylesheet" type="text/css" href="css/style2.css">
			<link rel="stylesheet" type="text/css" href="css/animate.css">
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/chngpwd.js"></script>	
			<script type="text/javascript" src="js/updtpr.js"></script>
			<script type="text/javascript" src="js/deletepic.js"></script>
			<script type="text/javascript" src="js/security.js"></script>
			<script type="text/javascript" src="js/comment_actions.js"></script>
			<script type="text/javascript" src="js/chkcap.js"></script>			
			<script type="text/javascript" src="js/sharefolder.js"></script>
			<?php
				$post_per_page =2;
				$pic_query = "SELECT * FROM picdetail";
				$res_count = mysqli_query($con,$pic_query);
				$pic_num = mysqli_num_rows($res_count);
				$total_groups = ceil($pic_num/$post_per_page);
				$timeline_query = "SELECT * FROM picdetail where userid = '{$_SESSION['uid']}'";
				$timeline_res = mysqli_query($con,$timeline_query);
				$timeline_num = mysqli_num_rows($timeline_res);
				$total_timeline = ceil($timeline_num/$post_per_page);
			?>			
			<script>
		
		$("document").ready(function(){
				$(".settingbtn").click(function(){
				$(".settingoption").toggle();
				});
		});
		$("document").ready(function(){
			$(".notification").click(function(){
			$(".notify_div").toggle();
			});
		});
		$("document").ready(function(){
				$(".arrow").click(function(){
				$(".cat_list").toggle();
				});
		});
		function showcmt(id)
		{
			$("#cmntdiv"+id).slideToggle();
		}
			$("document").ready(function(){
				$(".forward_arrow").click(function(){
					$(".finrdiv2").css({"margin-left":"-860px","transition":"0.8s ease-in-out"});
					$(".backward_arrow").fadeIn(500);
				});
				$(".backward_arrow").click(function(){
					$(".finrdiv2").css({"margin-left":"0px","transition":"0.8s ease-in-out"});
					$(this).fadeOut(500);
				});
			});
				$(document).mouseup(function (e)
					{

					    var setting = $(".setting");
					    if (setting.is(e.target)) // if the target of the click isn't the container...
					         // ... nor a descendant of the container
					    {
					        $(".settingoption").show();
					    }
					    else
					    {
					    	$(".settingoption").hide();
					    }
					});
				$(document).mouseup(function (e)
					{

					    var search = $(".search_result");
					  
					    if (e.target.id != search.attr('id') && !search.has(e.target).length) // if the target of the click isn't the container...
					         // ... nor a descendant of the container
					    {
					    	$(".search_result").hide();
					        $("#search").val("");
					       
					    }
					    else
					    {
					    	 $(".search_result").show();
					    }
					});
				$(document).mouseup(function (e)
					{

					    var editbox = $(".edit_container");
					  
					    if (e.target.id != editbox.attr('id') && !editbox.has(e.target).length) // if the target of the click isn't the container...
					         // ... nor a descendant of the container
					    {
					        $(".edit_container").hide();
					        $("#editcmnt").val("");
					    }
					    else
					    {
					        $(".edit_container").show();
					    	
					    }
					});
				$(document).mouseup(function (e)
					{

					    var dltbox = $(".deletebox_container");
					  
					    if (e.target.id != dltbox.attr('id') && !dltbox.has(e.target).length) // if the target of the click isn't the container...
					         // ... nor a descendant of the container
					    {
					    	$(".deletebox_container").hide();
					    }
					    else
					    {
					    	$(".deletebox_container").show();
					    }
					});
				$(document).mouseup(function (e)
					{

					    var shrbox = $(".share_alert");
					  
					    if (e.target.id != shrbox.attr('id') && !shrbox.has(e.target).length) // if the target of the click isn't the container...
					         // ... nor a descendant of the container
					    {
					    	$(".share_alert").hide();
					    }
					    else
					    {
					    	$(".share_alert").show();
					    }
					});
	$("document").ready(function(){
			$(".uploadbtn1").on('click','.me1',function(){
				$(".twodiv").css({"margin-left":"60px","transition":"0.4s ease-in-out"});
				$(this).addClass("asd");	
			});
			$(".uploadbtn1").on('click','.asd',function(){
				$(".twodiv").css({"margin-left":"120px","transition":"0.4s ease-in-out"});
				$(this).removeClass("asd").addClass("me1");
			});
			});
	$("document").ready(function(){
			$(".uploadbtn1").on('click','.me1',function(){
				$(".threediv").css({"margin-left":"60px","transition":"0.4s ease-in-out"});
				$(this).addClass("asd");	
			});
			$(".uploadbtn1").on('click','.asd',function(){
				$(".threediv").css({"margin-left":"120px","transition":"0.4s ease-in-out"});
				$(this).removeClass("asd").addClass("me1");
			});
			});
	$("document").ready(function(){
			$(".uploadbtn2").on('click','.me2',function(){
				$(".addp").css({"margin-top":"5px","transition":"0.4s ease-in-out"});
				$(".rmvdp").css({"margin-top":"10px","transition":"0.4s ease-in-out"});
				$(this).addClass("abhi");
				});
			$(".uploadbtn2").on('click','.abhi',function(){
				$(".addp").css({"margin-top":"70px","transition":"0.4s ease-in-out"});
				$(".rmvdp").css({"margin-top":"-32px","transition":"0.4s ease-in-out"});
				$(this).removeClass("abhi").addClass("me2");
				});
			});
			$("document").ready(function(){
			$("#threebtn").click(function(){
				$(".threediv").css({"margin-left":"60px","transition":"0.4s ease-in-out"})
			});
		});
		$("document").ready(function(){
			$("#updialog").click(function(){
				$(".slidepg").css({"z-index":'1',"position":'fixed',"display":'block'})
			});
		});
		$("document").ready(function(){
			$(".cnclbtn").click(function(){
			$(".slidepg").css({"display":'none'});
			$(".slidepg1").css({"display":'none'});	
			});
		});
		function showimagepreview(input){
		
			if(input.files && input.files[0]){
				var filerdr = new FileReader();
				filerdr.onload = function(e){
					$('#imgprvw').attr('src',e.target.result);
					$(".nextbtn").css({"display":'block'})
			
				}
				filerdr.readAsDataURL(input.files[0]);

			}


		}
		
    $(document).ready(
    	function(){
    		$('#udbtn').click(function(){
    			$(".upimg").css({"overflow":" hidden","z-index":"20"})
    			$(".overlay").css({"height":" 100%"})
    			});
    		});
     $(document).ready(function(){
    		$('.exist_folder').click(function(){
    			$(".upimg").css({"overflow":" hidden","z-index":"20"})
    			$(".folder_overlay").css({"height":" 100%"})
    			});
    		});
      $(document).ready(function(){
    		$('.folders').click(function(){
    			$(".upimg").css({"overflow":" hidden","z-index":"20"})
    			$(".folder_overlay").css({"height":" 0%"})
    			});
    		});
        $(document).ready(function(){
    		$('.backarw').click(function(){
    			$(".upimg").css({"overflow":" hidden","z-index":"20"})
    			$(".folder_overlay").css({"height":" 0%"})
    			});
    		});
				$("document").ready(function(){
			$(".yes").click(function(){
			$(".getfolder").css({"display":'block'})	
			});
		});
				$(document).ready(function(){
    			$('.hidefolder').click(function(){
    			$(".overlay").css({"height":"0"})
    			});
    		});
				$(document).ready(function(){
    			$('#cnfrmpwd').click(function(){
    			$("#cnfrmpwd").removeClass("animated shake");
    			});
    		});
				$(document).ready(function(){
    			$('.hidefolder').click(function(){
    			$(".upldbtn1").css({"display":"block"})
    			$(".nextbtn").css({"display":"none"})
    			});
    		});
			$(document).ready(function(){
				$('.menu3').click(function(){
    			$(".share_alert").css({"display":"block","z-index":'1',"position":'fixed'});
    			$("#shrtxt").focus();
    			});

			});
			$("document").ready(function(){
					$("#menu1").click(function(){
					$(".slidepg").css({"z-index":'1',"position":'fixed',"display":'block'})
				});
			});
			function editCmnt(id){
					$(".edit_container").css({"display":"block","z-index":'1',"position":'fixed'});
					var data = $("#Comet"+id).html();
					$("#editcmnt").val(data).focus();
					$("#editcmnthid").val(id);
			}
			function deleteBox(cmntid,picid,page,page_position)
			{
				$(".deletebox_container").css({"display":"block","z-index":'1',"position":'fixed'});
				values = cmntid + "," + picid + "," + page + "," + page_position;
				$("#dlt_cmnt_hid").val(values);
			}
			function deleteAlert(picid,page,page_position)
			{
				$(".deletealert_container").css({"display":"block","z-index":'1',"position":'fixed'});
				values = picid + "," + page + "," + page_position;
				$("#dlt_pic_hid").val(values);
			}
			function deleteFolderPic(id)
			{
				$(".deletefolderpic_container").css({"display":"block","z-index":'1',"position":'fixed'});
				foldername = $("#folderid").val();
				values = id + "," + foldername;
				$("#dlt_pic_hid").val(values);
			}
			$("document").ready(function(){
				$(".trash_icon").click(function(){
					$(".deletefolder_container").css({"display":"block","z-index":'1',"position":'fixed'});
					foldername = $("#hdtxt").val();
					$("#dlt_fld_hid").val(foldername);
				});
			});
			$("document").ready(function(){
     			$(".cancel_btn").click(function(){
     				$(".deletefolder_container").css({"display":"none"});
     			});
     		});
			$("document").ready(function(){
     			$(".cancel_btn").click(function(){
     				$(".deletebox_container").css({"display":"none"});
     			});
     		});
     		$("document").ready(function(){
     			$(".cancel_btn").click(function(){
     				$(".deletealert_container").css({"display":"none"});
     			});
     		});
     		$("document").ready(function(){
     			$(".cancel_btn").click(function(){
     				$(".deletefolderpic_container").css({"display":"none"});
     			});
     		});
			$("document").ready(function(){
     			$(".cncledit_btn_class").click(function(){
     				$(".edit_container").css({"display":"none"});
     			});
     		});
     		$("document").ready(function(){
     			$(".cancel_btn").click(function(){
     				$("#shrtxt").val("");
     				$(".share_alert").css({"display":"none"});
     			});
     		});
		$("document").ready(function()
		{
			$("#cnclbtn").click(function(){
				$(".nextbtn").css({"display":"none"});
			$(".slidepg").css({"display":'none'});
			$("#imgprvw").attr("src", "");
			document.getElementById("uploadfile").value = "";
			$("udbtn").css({"display":"none"});
			$(".upldbtn1").css({"display":"none"});


			});
		});
		function showImage(id)
		{        
	    	var trial = $('#folderimg'+id).attr('src');
	        $("#openimg").attr("src", trial);
	        $('.slideimg').css({"z-index":'1',"position":"absolute","display":'block'});
    	}
     $("document").ready(function(){
     	$(".close").click(function(){
     		$(".slideimg").css({"display":"none"});
     	});
     });
      $("document").ready(function(){
      	auto();
      });
      function auto()
      {
      	setTimeout(function(){
      					notification();
      					auto();
      				}, 500);
      }
      
      function notification()
      {
      	$.ajax({
  			type: "POST",
    		url: "fetch_notif.php",
    		dataType: "text",
    		success: function(data) {
 			
				$('.notif_count').html(data);
      		}
			});
      }
      $("document").ready(function(){
      	$(".notification").click(function(){
      		$.ajax({
  				type: "POST",
    			url: "notific.php",
    			dataType: "text",
    			success: function(data) {
 			
					$('.notify_div').html(data);
      			}
				});
			});
      });
       function searchPiktion(inp){
       		search = $(inp).val();
      		if(search =="")
      		{
      			$('.search_result').css({"display":"none"});
      		}
      		else
      		{
      			$('.search_result').load("search.php",{search:search});
				$('.search_result').css({"display":"block"});
      		}
        }
        $("document").ready(function(){
        	$(".search_result").on( "click", ".pagination a", function (e){
				e.preventDefault();
				search = $("#search").val();

				page = $(this).attr("data-page");
				//get page number from link
				$(".search_result").load("search.php",{search:search,page:page});
				$("#search").focus();
			});
		});
		$("document").ready(function(){
			var page = 0;
			var loading = false;
			var total_groups = <?=$total_groups;?>;
			$('.posts').load("loadmore.php", {'page_number':page}, function() {page++;});

			$(window).scroll(function() { //detect page scroll
		
				if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
				{
					if(page <= total_groups && loading==false) //there's more data to load
					{
						loading = true; //prevent further ajax loading
						$('.loadmore').html("Loading..."); //show loading image
					
						//load data from the server using a HTTP POST request
						$.post('loadmore.php',{'page_number': page}, function(data){
							$('.loadmore').hide();			
						$(".posts").append(data); //append received data into the element

						page++; //loaded group increment
						loading = false; 
					
						}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
						
						alert(thrownError); //alert with HTTP error
						loading = false;
				
						});
				
					}
				}
			});
		});
		$("document").ready(function(){
			var page = 0;
			var loading = false;
			var total_groups = <?=$total_timeline;?>;
			$('.content').load("timeline.php", {'page_number':page}, function() {page++;});

			$(window).scroll(function() { //detect page scroll
		
				if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
				{
					if(page <= total_groups && loading==false) //there's more data to load
					{
						loading = true; //prevent further ajax loading
						$('.loadtimeline').html("Loading..."); //show loading image
					
						//load data from the server using a HTTP POST request
						$.post('timeline.php',{'page_number': page,'total_groups':total_groups}, function(data){
							$('.loadtimeline').hide();			
						$(".content").append(data); //append received data into the element
						page++; //loaded group increment
						loading = false; 
					
						}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
						
						alert(thrownError); //alert with HTTP error
						loading = false;
				
						});
				
					}
				}
			});
		});
		$("document").ready(function(){
			$(".loaduserposts").click(function(){
				$(this).html("Loading...");
				page = $(".loadbutton").attr("data-page");
				userid = $(".loadbutton").attr("userid");
				
				$.post('usertimeline.php',{'page_number':page,'userid':userid},function(data){
				
					$(".loaduserposts").hide();
					$(".usercontent").append(data);
				});
			});
			

		});
	    function clicked(id){
	      	pid = id;
	      	$.ajax({
	  			type: "POST",
	    		url: "report.php",
	    		data:{id:pid},
	    		dataType: "text",
	    		success: function(data) {
	 			
					alert(data);
					$("#report"+id).fadeOut(1500);
	      		}
			});
	      }
    function copyValue(id)
    {
    	var txt1=$("#hidvalue"+id).val();
    	$('#fldbx').val(txt1);
    }
     function showImage1(id)
		{      
		 
    	var trial = $('#folderimg'+id).attr('src');
    	var array = trial.split("/");
    	var arr = array.pop();
        $("#upimg1").attr("src", trial);
        $(".slidepg1").css({"z-index":'10',"position":'fixed',"display":'block'});
        $("#folderpicnm").val(arr);
       }
       $("document").ready(function(){
			$(".exist_folder").click(function(){
			$(".saveinfolder").css({"display":'block'})	
			});
			$(".exist_folder").click(function(){
			$(".savefolder").css({"display":'none'})	
			});
		});
    	function get_token() {
    return (!empty($_SESSION['token'])) ? $_SESSION['token'] : 0;
}	
			</script>
    
$token=get_token();
	</head>
	<body>
		<div class="wrapper setthid">
			<div class="header">
				<div class="menubar setthid">
					<div class="menulogo ">
							<img src="img/naam.png" height=35px; width=35px; style="margin-left:5px;margin-top:2px; margin-right:5px;"/>
					</div>
						<div class="logotitle">
								<a href="frontindex.php?pageName=front" style="color:white;text-decoration:none;font-family:Harrington;">PIKTION</a>
						</div>
					
							<div class="feedbutton tth">
								<a href="frontindex.php?pageName=front&token=<?php echo$_SESSION['token']; ?>" style="color:white;text-decoration:none;font-family:verdana">News Feed</a>
							</div>
							
								<div class="trendingbutton tth">
									<a href="frontindex.php?pageName=trending&token=<?php echo$_SESSION['token']; ?>" style=" color:white;text-decoration:none;font-family:verdana">Trending</a>
								</div>
									<div class="searchbar">
										<input type="text"name="search"id="search"placeholder=" Search Piktion" onkeyup="searchPiktion(this);">
										<div class="search_result"style="width:400px;height:auto;background:#e5e5e5;margin-top:18px;">
								
										</div>
									</div>
						<div class="rightheader setthid">
							<?php
								echo"<div class='profilepic'>";
									echo"<img  src='uploads/{$img_row['displaypic']}' width=30px; height=30px/>";
									echo"</div>";
								
							?>

									<div class="Username tth">
									<a href='frontindex.php?pageName=profilepage&token=<?php echo$_SESSION['token']; ?>' 
									style="color:white;text-decoration:none;font-family:verdana;text-transform:capitalize;">
									<?php echo $_SESSION['uname']; ?>
									</a>
									</div>
									
									<div class="notification">
										<img style="float:left;" src="img/notification.png" width=25px height=25px/>
										
										<div class='notif_count'></div>
										<div class="notify_div">
											
										</div>
									</div>
									<div class="setting"><button class="settingbtn"style="background:#009688;outline:none;border:none;"><img src="img/36.png" width=25px height=25px/></button>
										<div class="settingoption">
											<ul>
											<li><a href="frontindex.php?pageName=editpage&token=<?php echo$_SESSION['token']; ?>"><div class="setlist">Edit Profile</div></a></li>
											<li><a href="#"><div class="setlist">Advertise</div></a></li>
											<li><a href="lgout.php"><div class="setlist">Logout</div></a></li>
										
											<li><a href="#"><div class="setlist" style="border:none;">Report Problem</div></a></li>
											</ul>
									
										</div>
									</div>
						</div>
				</div>

				</div>

<div class="slidepg">
	<div class="upmain">
		<div class="upldpg">
			Upload
		</div>
		<div class="upcontent">
			<div class="captxt">
					Add Caption
			</div>
			<form action="upload.php"  id="uploadForm" enctype="multipart/form-data" method="post">
			<div class="capdiv">
				<textarea class="capbox"type="textarea" id="capbox" name="capbox" placeholder="Enter Caption Here" maxlength=300></textarea> 
			</div>
			<form id="form1" runat="server">
			<div class="upbtn">
				<div class="upimg" >
					<div class="folder_overlay">
						<div><img class="backarw"src="img/arrow1.png"/></div>
					
						<?php
						$j=1;
						while($row3=mysqli_fetch_assoc($res3))
						{

							echo"<div class='folders'>";
							echo"<input type='hidden' id='hidvalue{$j}' value='$row3[foldername]'>";
								echo"<img src='img/folder.png' width=70px height=60px onclick='copyValue($j);'/>";
								echo"<div style='width:100%;height:20px;color:#fff;margin-left:18px;'>";echo"$row3[foldername]";
								$j++;
								echo"</div>";
							echo"</div>";
							
						}
						
							?>
							
						
							
					</div>
					<div class="overlay">
					
						<div style="width:75%;height:40px;background:#eee;padding:10px 25%;font-size:30px;margin-top:10px;">Store In Folder?</div>
							<div style="width:70px;height:70px;margin:10px 110px;"><div class="yes">Yes</div></div>
								<div class="nowrap" style="width:70px;height:70px;margin:-80px 210px;"><input class="hidefolder" type="button" value="No"/></div>
									<div class="getfolder" style="width:100%;height:30px;margin-top:100px;display:none;">
											<div class="foldername"><input class="folder_input" type="text" id="fldbx" name="fldbx"placeholder=" Give Folder Name" style="border:1px solid #fff; outline:none; border-radius:3px;" /></div>
											<div class="save_folder">
											<input class="savefolder" type="submit" id="upldbtn" name="upldbtn" value="Save"/>
											<input class="saveinfolder" type="submit" id="saveinfldr" name="saveinfldr" value="Save"/>
											</div>
									
								<div class="exist_folder">Choose Existing Folder</div>
								</div>
					</div>
					
								<img id="imgprvw" src="" alt=" Your Image preview will appear here" width=100% height=300px />
				</div>
			</div>
					
					
		
						<div class="holddiv">
							<div class="upldbtn" style="margin-left:100px; float:left;" >
								<input class="btn2" type="file" id="uploadfile" name="uploadfile" value="Upload" onchange="showimagepreview(this)" 
								style="float:right;background:#fff; outline:none; border:0px;" />
							</div>
							</form>
											<div class="hld" style="width:145px; height:24.5px; float:left;">
									<div class="cnclbtn" style="float:right;">
										<input class="btn3" type="button" id="cnclbtn" name="cnclbtn" value="Cancel" onclick=""/>
									</div>
											<div class="nextbtn" style="float:right; display:none;">
												<input class="btn1"type="button" id="udbtn" name="udbtn" value="Next"  disable>
											</div>
											<div class="upldbtn1" style="float:right;display:none">
												<input class="btn1"type="submit" id="submitpic" name="submitpic" value="Upload"  disable>
											</div>
											</div>
							</div>
							

			</form>
		
			</div>
		</div>
		</div>
		<div class="slideimg">
			<div style="float:right;" class='close'><img src="img/close.png"/></div>
			<div class="imghld1">
				<img src="" width=100% height=100% alt='mainIMG' id='openimg'/>
			</div><br><br><br><br>
		</div>
		<div class="edit_container" style="margin:12% 34.5%;width:400px;height:150px;position:absolute;display:none;z-index:-1;">

			<div class="alert" style="background:#009688;width:400px;height:120px;">
				<div style="color:#fff;width:150px;height:10px;padding:5px 5px;">Edit your Comment...</div>
				<hr color="#fff">
				<div style="margin:5px 12px;"><textarea class="editshow"id="editcmnt" rows=2 cols=50 style="border-radius:5px;outline:none;"></textarea></div>
				<div style="margin:10px 12px;">
					<input type="hidden" id="editcmnthid" value=""/>
					<div style="float:left;" class="edit_btn_class"><input class="editshow" type="button" value="Update" id="edit_cmnt_btn" onclick="editcmnt_function();"/></div>
					<div style="margin-left:10px;float:left;"class="cncledit_btn_class"><input type="button" value="Cancel" id="cancel_edit_btn"/></div>
				</div>
			</div>
		</div>
		<div class="deletebox_container">
			<div class="alert" style="background:#009688;width:100%;height:100%;">
				<div style="width:125px;height:10px;color:#fff;padding:5px 10px;font-size:18px;">Delete Comment</div><hr color="#fff">
				<div class="delete_text">Are you sure you want to delete this comment?</div>
				<div style="width:115px;padding:22px 10px;" class="delete_btn_wrap">
					<input type="hidden" id="dlt_cmnt_hid" value=""/>
					<input class="delete_btn" type="button" value="Delete" onclick="deleteComment();"/>
					<input class="cancel_btn" type="button" value="Cancel" />
				</div>
			</div>
		</div>
		<div class="deletealert_container">
			<div class="alert" style="background:#009688;width:100%;height:100%;">
				<div style="width:125px;height:10px;color:#fff;padding:5px 10px;font-size:18px;">Delete Pic</div><hr color="#fff">
				<div class="delete_text">Are you sure you want to delete this pic?</div>
				<div style="width:115px;padding:22px 10px;" class="delete_btn_wrap">
					<input type="hidden" id="dlt_pic_hid" value=""/>
					<input class="delete_btn" id ="dlt_pic_btn"type="button" value="Delete" onclick="deletePic();"/>
					<input class="cancel_btn" type="button" value="Cancel" />
				</div>
			</div>
		</div>
		<div class="deletefolderpic_container">
			<div class="alert" style="background:#009688;width:100%;height:100%;">
				<div style="width:125px;height:10px;color:#fff;padding:5px 10px;font-size:18px;">Delete Pic</div><hr color="#fff">
				<div class="delete_text">Are you sure you want to delete this pic?</div>
				<div style="width:115px;padding:22px 10px;" class="delete_btn_wrap">
					<input type="hidden" id="dlt_pic_hid" value=""/>
					<input class="delete_btn" id ="dlt_pic_btn"type="button" value="Delete" onclick='dltFolderPic();'/>
					<input class="cancel_btn" type="button" value="Cancel" />
				</div>
			</div>
		</div>
		<div class="deletefolder_container">
			<div class="alert" style="background:#009688;width:100%;height:100%;">
				<div style="width:125px;height:10px;color:#fff;padding:5px 10px;font-size:18px;">Delete Folder</div><hr color="#fff">
				<div class="delete_text">Are you sure you want to delete this folder?</div>
				<div style="width:115px;padding:22px 10px;" class="delete_btn_wrap">
					<form action="delete_folder.php" method="post">
						<input style="float:left;" type="hidden" id="dlt_fld_hid" name="dlt_fld_hid" value=""/>
						<input style="float:left;" class="delete_btn" type="submit" value="Delete"/>
						<input class="cancel_btn" type="button" value="Cancel" />
					</form>
				</div>
			</div>
		</div>
		<div class="share_alert">
			<div style="background:#009688;width:100%;height:100%;">
				<div style="width:125px;height:10px;color:#fff;padding:5px 12px;font-size:18px;">Share Folder...</div>
				<hr color="#fff">
				<div style="margin:10px 12px;">
					<div class="shared_msg">Your folder has been shared successfully.</div>
					<input type="text" placeholder="Enter Email" id="shrtxt" />
				</div>
				<div class="share_actions" style="margin:10px 12px;">
					<input type="button" value="Share" class="share_btn" onclick="shareFolder();"/>
					<input class="cancel_btn" type="button" value="Cancel" />
				</div>
				<div class="done_action"style="margin:10px 12px;display:none;">
					<input class="cancel_btn" type="button" value="Done" />
				</div>
			</div>
		</div>
