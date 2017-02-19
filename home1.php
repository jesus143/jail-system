<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['jail_officer']))
{
 header("Location:loginnnn.php");
}
$res=mysql_query("SELECT * FROM jail_officer WHERE officer_id=".$_SESSION['jail_officer']);
$userRow=mysql_fetch_array($res);


?>
<!DOCTYPE html>
<html>

<head>
<title>Welcome - <?php echo $userRow['username']; ?></title>

</head>
<body>
<div id="header">
 <div id="left">
    <label>Online Evaluation System</label>
    </div>
    <div id="right">
     <div id="content">
         Hi <?php echo $userRow['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
		 <a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
	
</div>

	
</body>
</html>