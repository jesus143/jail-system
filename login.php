<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN</title>
	</head>

	<body>
		<?php
		session_start();
		$UserName=$_POST['username'];
		$Password=$_POST['password'];
		$UserType=$_POST['UserType'];
		if ($UserType=="Officer")
		{
			$con=mysql_connect('localhost','root','');
			mysql_select_db("jail", $con);
			$sql = "select * from jail_officer where username='".$UserName."' and password='".$Password."'";
			$result = mysql_query($sql,$con);
			$records = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			if ($records==0)
			{
			echo $records;
			echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'login1.php\';</script>';
			} 
			else 
			{
			$_SESSION['ID']=$row['officer_id'];
			$_SESSION['Name']=$row['name'];
			header("location:home.php");

			}
			mysql_close($con);
		}
		else if($UserType=="Nurse")
		{
			$con=mysql_connect('localhost','root','');
			mysql_select_db("jail", $con);
			$sql = "select * from physician
			 where username='".$UserName."' and password='".$Password."'";
			$result = mysql_query($sql,$con);
			$records = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			if ($records==0)
			{
			echo $records;
			echo '<script type="text/javascript">alert("Wrong UserName or Password");</script>';
			} 
			else 
			{
			$_SESSION['ID']=$row['physician_id'];
			$_SESSION['Name']=$row['name'];
			header("location:nursehome.php");

			}
			mysql_close($con);
		}
		else if($UserType=="Warden")
		{
			$con=mysql_connect('localhost','root','');
			mysql_select_db("jail", $con);
			$sql = "select * from warden
			 where username='".$UserName."' and password='".$Password."'";
			$result = mysql_query($sql,$con);
			$records = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			if ($records==0)
			{
			echo $records;
			echo '<script type="text/javascript">alert("Wrong UserName or Password");</script>';
			} 
			else 
			{
			$_SESSION['ID']=$row['warden_id'];
			$_SESSION['Name']=$row['name'];
			header("location:warden.php");

			}
			mysql_close($con);
		}
		else
		{
			$con=mysql_connect('localhost','root','');
			mysql_select_db("jail", $con);
			$sql = "select * from judge where username='".$UserName."' and password ='".$Password."'";
			$result = mysql_query($sql,$con);
			$records = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			if ($records==0)
			{
			echo $records;
			echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.html\';</script>';
			} 
			else 
			{
			$_SESSION['ID']=$row['judge_id'];
			$_SESSION['Name']=$row['name'];
			header("location: judge_home.php");

			}
			mysql_close($con);
		}

		?>

	</body>
</html>
