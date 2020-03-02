<?php 
	require_once('../includes/main_functions.php');
	if(!isset($_SESSION['uname'])) redirectTo('../');
	$url = "dashboard.php";
	$pageName="dashboard";
	if(isset($_GET['pageName']) && !empty($_GET['pageName']) && is_string($_GET['pageName']))
	{
		$pageName = $_GET['pageName'];
		$url = $pageName.".php";
		if(!file_exists($url)){
			$url = "dashboard.php";
			$pageName = "dashboard";
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADmin Panel ..:.. </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/code.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="wrapper">
	<div class="header">
		<div class="logo">
		
		<img src="img/naam.png" width="100px" height="80px"/></div>
		<div class="logname">piktion</div>
		<div class="heading" style="font-size:70px;text-align:center;">Welcome Admin</div>
		<div class="logout"><a href="../public/lgout.php">Logout</a></div>
	</div>
	<!-- header endz here  -->
	<div class="left_bar">
		<div class="links">
			<ul>
				<a href="index.php?pageName=addmember"><li>AddMember</li></a>
				<a href="index.php?pageName=user"><li>user</li></a>
				<a href="index.php?pageName=comments"><li>comments</li></a>
				<a href="index.php?pageName=photos"><li>Photos</li></a>
			</ul>
		</div>
		<div class="mainsite"><a class="sitelink" href="../public/frontindex.php">go to main site</a></div>
	</div>
	<div class="right_bar">
		<div class="main_container">
			<div class="row" style="text-transform:uppercase;">
				<h1>
				<?php 
					echo $pageName;
				 ?>
			   Page</h1>
			</div>
