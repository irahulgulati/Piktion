<?php
	require_once('../includes/main_functions.php');
	if(isset($_POST['search']))
	{

		if(isset($_POST["page"])){

			$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
			if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
		}else{
			$page_number = 1; //if there's no page number, set it to 1
		}
		$item_per_page = 3;
		$searchtxt = $_POST['search'];
		$srchtxt = mysqli_real_escape_string($con,$searchtxt);
		$query = "SELECT * FROM user_detail WHERE name like '%$srchtxt%' order by name";
		$res = mysqli_query($con,$query);
		$num=mysqli_num_rows($res);
		
		$query1 = "SELECT * FROM picdetail WHERE caption like '%$srchtxt%'";
		$res1 = mysqli_query($con,$query1);
		$num1 = mysqli_num_rows($res1);

		if($num>0)
		{
			//break records into pages
			$total_pages = ceil($num/$item_per_page);
			
			//get starting position to fetch the records
			$page_position = (($page_number-1) * $item_per_page);
			$query_user = "SELECT * FROM user_detail WHERE name like '%$srchtxt%' order by name limit $page_position,$item_per_page";
			$res_user = mysqli_query($con,$query_user);
			while($row=mysqli_fetch_assoc($res_user))
			{
					echo"<div class='search_user'>
						<div style='width:30px;height:30px;float:left;margin-top:3px;'>
							<img style='width:30px;height:30px;border-radius:50%;'  src='uploads/{$row['displaypic']}'/>
						</div>
						<a style='color:#259;'href='frontindex.php?pageName=userprofile&userid={$row['id']}'>
							<div style='width:200px;margin-left:40px;'>{$row['name']}</div>
							<div style='width:300px;margin-left:40px;'>{$row['email']}</div>
						</a>
					</div>";
			}
		}
		else if($num1>0)
		{
			//break records into pages
			$total_pages = ceil($num/$item_per_page);

			//get starting position to fetch the records
			$page_position = (($page_number-1) * $item_per_page);
			$query_pics = "SELECT * FROM picdetail WHERE caption like '%$srchtxt%' order by id limit $page_position,$item_per_page";
			$res_pics = mysqli_query($con,$query_pics);
			while($row1 = mysqli_fetch_assoc($res1))
			{
				echo"<div class='search_user'>
					<div style='width:30px;height:30px;float:left;margin-top:3px;'>
						<img style='width:30px;height:30px;'  src='uploads/{$row1['picname']}'/>
					</div>
					<a style='color:#259;' href='frontindex.php?pageName=post&picid={$row1['id']}'>
						<div class='search_pic'>{$row1['caption']}</div>
					</a>
				</div>";
			}
		}
		else
		{		
			echo"<div style='width:400px;height:auto;padding:7px 0px;text-align:center;color:#259;'>No result found!!!</div>";exit;
		}
		if($total_pages>1){
			echo '<div align="center" style="height:30px;">';
			/* We call the pagination function here to generate Pagination link for us. 
			As you can see I have passed several parameters to the function. */
			echo paginate_function($item_per_page, $page_number, $num, $total_pages);
			echo '</div>';
		}	
		exit;
	}
	################ pagination function #########################################
	function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
	{
	    $pagination = '';
	    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
	        $pagination .= '<ul class="pagination">';
	        
	        $right_links    = $current_page + 3; 
	        $previous       = $current_page - 3; //previous link 
	        $next           = $current_page + 1; //next link
	        $first_link     = true; //boolean var to decide our first link
	        
	        if($current_page > 1){
				$previous_link = ($previous==0 || $previous==$previous)? 1: $previous;
	            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
	            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
	                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
	                    if($i > 0){
	                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
	                    }
	                }   
	            $first_link = false; //set first link to false
	        }
	        
	        if($first_link){ //if current active page is first link
	            $pagination .= '<li class="first active">'.$current_page.'</li>';
	        }elseif($current_page == $total_pages){ //if it's the last active link
	            $pagination .= '<li class="last active">'.$current_page.'</li>';
	        }else{ //regular current link
	            $pagination .= '<li class="active">'.$current_page.'</li>';
	        }
	                
	        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
	            if($i<=$total_pages){
	                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
	            }
	        }
	        if($current_page < $total_pages){ 
					$next_link = ($i > $total_pages) ? $total_pages : $i;
	                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
	                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
	        }
	        
	        $pagination .= '</ul>'; 
	    }
	    return $pagination; //return pagination links
	}
?>