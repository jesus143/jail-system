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
	 $pass = mysql_real_escape_string($_POST['password']);
	 $res=mysql_query("SELECT * FROM officer WHERE username='$username'");
	 x`$row=mysql_fetch_array($res);
	 if($row['password']==md5($pass))
	 {
		$_SESSION['jail_officer'] = $row['officer_id'];
		header("Location: home.php");
	 }
	 else
	 {
		  ?>
				<script>alert('wrong details');</script>
				<?php
		 }
		 
}
				?>
<!DOCTYPE html >
<html >
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
			<form method="post">
			<table align="center" width="30%" border="0">
			<tr>
			<td><td>Username<input type="text" class="form-control" name="username" /></td>
							</tr>
			<tr>
			<td><<td class="table-active">Password<input type="password" class="form-control" name="password" /></td>
							</tr>
			<tr>
			<td><button type="submit" name="login">Sign In</button></td>
			</tr>
			
			
			</table>
			</form>
	</div>
	</div>
</center>
</body>
</html>