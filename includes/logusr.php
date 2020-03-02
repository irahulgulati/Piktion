<?php
	require_once('main_functions.php');

	function lgusr($lgusrnm,$lgusrpwd)
	{
		global $con;
			$pwd1=sha1($lgusrpwd);
			$hash=md5('pk16jn25aug15RgaS21');
			$salt=sha1('btchdvtctinst');
			$salt1=crc32($pwd1);
			$hash1=md5($salt1);
			$slths=sha1($salt.$hash.$salt1);
			$pwd=$pwd1.$hash.$salt.$salt1.$hash1.$slths;
		$query = "SELECT id,name,email,isadmin,isactive,profession,contact,followers,gender,dob FROM user_detail where name='{$lgusrnm}' and password='{$pwd}'";
		$res = mysqli_query($con,$query);
		
		if($row=mysqli_fetch_assoc($res))
		{
			
			if($row['isadmin'] == 1 && $row['isactive'] == 1)
			{
				$_SESSION['uname'] = $row['name'];
				$_SESSION['uid']= $row['id'];
				$_SESSION['uflow']= $row['followers'];
				$_SESSION['uconi']= $row['contact'];
				$_SESSION['uprofession'] = $row['profession'];
				$_SESSION['umail'] = $row['email'];
				$_SESSION['ugndr'] = $row['gender'];
				$_SESSION['date'] = $row['dob'];
				$initok=md5('adftwthjaggydgugauwbncbnmkloi54658965672882=@4gh7#897Y');
				$cook=$initok.$row['name'];
				$sectok=crc32($cook);

				$cook1=$sectok.$row['id'];
				$rand= md5(uniqid(mt_rand(), true));
				$trdtok=md5($rand);
				$token=sha1($trdtok);
				$_SESSION['token'] = $token;
				// redirectTo('../admin/');
				// echo "admin";
				return "admin";
			}
			else if($row['isadmin'] == 0 && $row['isactive'] == 1)
			{
				$_SESSION['uname'] = $row['name'];	
				$_SESSION['uid']= $row['id'];
				$_SESSION['uprofession'] = $row['profession'];	
				$_SESSION['uflow']= $row['followers'];
				$_SESSION['uconi']= $row['contact'];
				$_SESSION['umail'] = $row['email'];
				$_SESSION['ugndr'] = $row['gender'];
				$_SESSION['date'] = $row['dob'];
				$initok=md5('adftwthjaggydgugauwbncbnmkloi54658965672882=@4gh7#897Y');
				$cook=$initok.$row['name'];
				$sectok=crc32($cook);

				$cook1=$sectok.$row['id'];
				$rand= md5(uniqid(mt_rand(), true));
				$trdtok=md5($rand);
				$token=sha1($trdtok);
				$_SESSION['token'] = $token;
				// redirectTo('frontindex.php');
				return "user";
			}
		}
	}

?>