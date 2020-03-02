<?php
	require_once('main_functions.php');
	require_once('config.php');
	
	function insertMember($name, $mail, $password, $isadmin,$isactive)
	{
		global $con;
		$pwd1=sha1($password);
			$hash=md5('pk16jn25aug15RgaS21');
			$salt=sha1('btchdvtctinst');
			$salt1=crc32($pwd1);
			$hash1=md5($salt1);
			$slths=sha1($salt.$hash.$salt1);
			$pwd=$pwd1.$hash.$salt.$salt1.$hash1.$slths;
	$query="INSERT INTO user_detail (name,email,password,isadmin,isactive) VALUES ('{$name}', '{$mail}','{$pwd}', {$isadmin},{$isactive})";
	$res = mysqli_query($con,$query);
		return $res;
	}
	function fetchComments()
	{
		global $con;
		//$query="SELECT description from comment";	
	$query = "SELECT comment.description,user_detail.name FROM comment inner join user_detail on user_detail.id = comment.userid";
	$res = mysqli_query($con,$query);
		return $res;
	}
	function fetchUsers()
	{
		global $con;
		//$query="SELECT description from comment";	
	$query = "SELECT id,name,email FROM user_detail";
	$res = mysqli_query($con,$query);
		return $res;
	}
	function fetchPhotos()
	{
		global $con;
		$query = "SELECT id,userid,picname,time,date FROM picdetail";
		$res = mysqli_query($con,$query);
		return $res;
	}
	function signMember($name, $email, $password, $contact, $dob, $gender)
	{
		global $con;
		// $name = preg_replace("/[^0-9]+/", "", $name);
		$query1 ="SELECT * FROM user_detail";
		$res1= mysqli_query($con,$query1);
	
		$flag =0;

		while($row= mysqli_fetch_assoc($res1))
		{

			if($row['email'] == $email)
			{
				$flag = 1;
				return false;
			}	
		}
		if($flag ==0)
		{
			if($gender=="Male")
			{
				$pic = "dmyml.png";
			}
			else
			{
				$pic = "dmyfml.png";
			}
			$pwd1=sha1($password);
			$hash=md5('pk16jn25aug15RgaS21');
			$salt=sha1('btchdvtctinst');
			$salt1=crc32($pwd1);
			$hash1=md5($salt1);
			$slths=sha1($salt.$hash.$salt1);
			$pwd=$pwd1.$hash.$salt.$salt1.$hash1.$slths;
			$query = "INSERT INTO user_detail (name,email,password,contact,dob,gender,isactive,displaypic) VALUES ('{$name}', '{$email}','{$pwd}', '{$contact}','{$dob}','{$gender}',1,'{$pic}')";
				$res = mysqli_query($con,$query);
			return true;
		}
}
function updateusr($name, $email, $contact,$profession, $dob, $gender)
	{
		global $con;
		// $pwd1=sha1($password);
		// 	$hash=md5('pk16jn25aug15RgaS21');
		// 	$salt=sha1('btchdvtctinst');
		// 	$salt1=crc32($pwd1);
		// 	$hash1=md5($salt1);
		// 	$slths=sha1($salt.$hash.$salt1);
		// 	$pwd=$pwd1.$hash.$salt.$salt1.$hash1.$slths;

			  $query = "UPDATE user_detail  SET name='{$name}',email='{$email}',contact={$contact},profession='{$profession}',dob='{$dob}',gender='{$gender}'  Where id=".$_SESSION['uid'];
				
				$res = mysqli_query($con,$query);
				 $_SESSION['uname']=$name;
				 $_SESSION['uprofession']=$profession;
					return $res;

} 
function updatepwd($newpwd)
{
	global $con;
	$query = "UPDATE user_detail SET password='{$newpwd}'WHERE id=".$_SESSION['uid'];
	$res = mysqli_query($con,$query);
	return $res;
}
//follow button function starts here
// function flowInc()
// {
// 		global $con;
// 	$query= "UPDATE user SET followers= followers + 1 Where id=".$_SESSION['uid'];  
// 	$res=mysqli_query($con,$query) ;
// 	$query1 = "select followers from user where id=".$_SESSION['uid'];
// 	$res1 = mysqli_query($con,$query1);
// 	$row1=mysqli_fetch_assoc($res1);
// 	return $row1;
// }

	


?>