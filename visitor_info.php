<?php
//set up for mysql Connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
//test if the connection is established successfully then it will proceed in next process else it will throw an error message
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

//we specify here the Database name we are using
mysql_select_db('jail');
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$status=$_POST['status'];
$address=$_POST['address'];
$caseNumber=$_POST['caseNumber'];
$caseName=$_POST['caseName'];
$date=$_POST['date'];

$sql = "INSERT INTO `jail`.`inmate` (`firstname`, `middlename`, `surname`, `gender`,  `marital_status`, `address`,  `case_number`, `case_name`, `date`) 
	VALUES ( '{$fname}', '{$mname}', '{$lname}', '{$gender}', '{$status}', '{$address}', '{$caseNumber}', '{$caseName}','{$date}');";
//we are using mysql_query function. it returns a resource on true else False on error
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('The data is already: ' . mysql_error());
 
}

?>
					<script type="text/javascript">
						alert("New Record is Added thank you");
						window.location = "inmate.php";
					</script>
					<?php
//close of connection
mysql_close($conn);
?>