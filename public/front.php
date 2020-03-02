<?php
	require_once('../includes/main_functions.php');
	if(!isset($_SESSION['uid'])) redirectTo('index.php');

?>
<div class="container setthid">
	<div class="containermid setthid">
		<div class="editpg">Feed</div>
		<div class="posts">
			
		</div>
		<hr width=70% color="#fff">
	</div>

				
				<!-- upload button starts here -->
	<div class="uploadbtn">
		<div class="me">+</div>
		<input type="button" id="updialog"	name="updialog" value="+"/>								
	</div>
</div>
	