<?php
session_start();
if(isset($_SESSION['jail_officer'])!="")
	{
		header("Location: home1.php");
	}
include_once 'dbconnect.php';

if(isset($_POST['signup']))
	{
		 $username = mysql_real_escape_string($_POST['username']);
		 $upass = md5(mysql_real_escape_string($_POST['password']));
		 $name = mysql_real_escape_string($_POST['name']);
		 $position = mysql_real_escape_string($_POST['position']);
		 
		 
		 
		 if(mysql_query("INSERT INTO jail_officer(username,password,name,position) VALUES('$username','$upass','$name','$position') "))
		 {
		  ?>
				<script>alert('successfully registered ');</script>
				<?php
		 }
		 else
		 {
		  ?>
				<script>alert('error while registering you...');</script>
				<?php
		 }
		  
		 
}

?>
<!DOCTYPE html >
<html >
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" href="register.css" type="text/css" />

</head>
<body>
	<img alt="full screen background image" src="Images/teacher.jpg" id="full-screen-background-image" />
<center>
	<div id="header">
		<div id="left">
		<label>Student Login</label>
		</div>
		
	
	</div>
	<div id="tnks">
		
	<div id="logform">
		<form method="post">
		<table align="center" width="40%" border="0">
				
				<tr>
								<td>Username<input type="text"  name="username" /></td>
							</tr>

							<tr>
								<td>Password<input type="password"  name="password" /></td>
							</tr>
						
				<tr>
					<td><input type="type" name="name" required /></td>
				</tr>
				<tr>
					<td><input type="type" name="position" required /></td>
				</tr>
				<tr>
					<td><button type="submit" name="signup">Sign Me Up</button></td>
				</tr>
				<tr>
					<td><a href="loginnnn.php">Sign In Here</a></td>
				</tr>
				
		</table>
		</form>
		</div>
	</div>
</center>
</body>
</html>