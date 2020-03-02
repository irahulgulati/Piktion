
<?php
	require_once('../includes/main_functions.php');
	if(!isset($_SESSION['uid']))
	{
		redirectTo('../public/index.php');
	}
?>
<form action="insertMember.php" method="post" id="memForm">
<div class="row">
				<div class="name">Name</div>
				<div class="box">
					<input type="text" name="name" id="name"/>
				</div>
			</div>
				<div class="row">
					<div class="name">E-mail</div>
						<div class="box">
							<input type="email" name="mail" id ="mail"/>
				</div>

			</div>	
			<div class="row">
				<div class="name">Password</div>
				<div class="box">
					<input type="password" name="password" id="password"/>
				</div>

			
			<div class="row">
				<div class="name">Is Admin</div>
				<div class="box">
					<input type="checkbox" name="isadmin" id="isadmin"/>
				</div>
			</div>
			<div class="row">
				<div class="name">Is Active</div>
				<div class="box">
					<input type="checkbox" name="isactive" id="isactive"/>
				</div>
			</div>
			<div class="row">
				<div class="buttons">
					<input type="button" value="Add" name="btn" onclick="validMem()" />
					<input type="button" value="Clear" name="clear"/>
				</div>
			</div>
</form>