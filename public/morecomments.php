<?php
	function next_comments_pagination($current_page,$total_pages,$picid)
	{
			
	 	$pagination = '';
	    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages) //verify total pages and current page number
	    {  
			for($i = $current_page+1;$i <= $total_pages;$i++)
			{
				$pagination.="<div id='nxt_cmnt' onclick='more($i,$picid);'>Next Comments</div>";
				break;
			}

   		}
		return $pagination;

	}

	function previous_comments_pagination($current_page,$picid)
	{
		$previous = '';
		if($current_page > 1)
		{
			for($i = $current_page-1 ; $i < $current_page; $i++ )
			{
				$previous.="<div id='prev_comnts' onclick='more($i,$picid);'>Previous Comments</div>";
			}
		}
		return $previous;
	}
	function escape($cmnt)
	{
		global $con;
		$cmnt = mysqli_real_escape_string($con,$cmnt);
		return $cmnt;
	}
?>