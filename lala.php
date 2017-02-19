<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['jail_officer'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['login']))
{
	 $username = mysql_real_escape_string($_POST['username']);
	 $password = mysql_real_escape_string($_POST['password']);
	 $res=mysql_query("SELECT * FROM jail_officer WHERE username='$username'");
	 $row=mysql_fetch_array($res);
	 
		$_SESSION['jail_officer'] = $row['officer_id'];
		header("Location: home.php");
	 
		 
}
				?>
<!DOCTYPE html >
<html>
<head>

<title> Login & Registration</title>
<link rel="stylesheet" href="register.css" type="text/css" />
</head>
<body>
	<img alt="full screen background image" src="Images/teacher.jpg" id="full-screen-background-image" />
	<div id="header">
		<div id="left">
			<label>Guidance Personnel Registration</label>
		</div>
		<div id="right">
		 <div id="content">
			 <a href="index.php">Back</a>
			</div>
		</div>
	</div>
	<div id="welcome">
		<center><p>Welcome Guidance Personnel!</p><br>
		</center>
	
	<div id="form">
			<form method="POST" action="">
						<center>
							<table class="table" >
							<tr>
								<td><input type="text" class="form-control" name="user"><br></td>
							</tr>
							<tr>
								<td><input type="password" class="form-control" name="pass"><br></td>
							</tr>
							<tr>
								<td><input type="submit" class="form-control" name="login" value="LOGIN"></td>
							</tr>
							</table>
							</center>
							</form>
	</div>
	</div>
</center>
</body>
</html>