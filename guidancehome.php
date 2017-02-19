<?php
	session_start();
	include_once 'dbconnect.php';

	if(!isset($_SESSION['jail_officer']))
	{
	 header("Location: log.php");
	}
	$res=mysql_query("SELECT * FROM officer WHERE officer_id=".$_SESSION['jail_officer']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html >
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="home.css" type="text/css" />
</head>
<body>
	<img alt="full screen background image" src="Images/teacher.jpg" id="full-screen-background-image" />
	<div id="header">
		<div id="left">
		<label>Guidance's Personnel Corner</label>
		</div>
		<div id="right">
		 <div id="content">
			 Hi <?php echo $userRow['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <a href="logout.php?logout">Sign Out</a>
			</div>
		</div>
	
	</div>
	<div id ="answer">
		<center><p>This is for Guidance Personnel's Corner </p><br>
		<p><a href="gview_paginated.php"><button type="button" class = "table3">View Faculty Here</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<!--<a href="question_view_paginated.php"><button type="button" class = "table3">View Questions Here</button></a></p>-->
		<a href="gview2.php"><button type="button" class = "table4">View Result Here</button></a></p>
		</center>
	</div>
	
</body>
</html>