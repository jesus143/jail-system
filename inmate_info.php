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
$data = mysql_select_db('jail', $conn);
  
extract($_POST); 
 



$sql = "INSERT INTO `inmate` (`inmate_id`, `surname`, `firstname`, `middleinitial`, `gender`, `age`, `civilstatus`, `education`, `religion`, `offense`, `case_number`, `court`, `occupation`, `datecommited`, `remarks`, `attorney_name`,  `attorney_contact`) 
VALUES (NULL, '$lname', '$fname', '$mname', '$gender', '$age'	, '$civilstatus', '$education', '$religion', '$offense', '$caseNumber', '$court', '$occupation', '$datecommited', '$remarks', '$attorney_name', '$attorney_contact')";
 
//$sql = "INSERT INTO `inmate`(`surname`, `firstname`,`middleinitial`, `gender`, `age`, `civilstatus`, `education`, `religion`,  `offense`, `case_number`, `court`, `occupation`, `datecommited`, `remarks`) 
	//VALUES ( '{$lname}' ,'{$fname}', '{$mname}', '{$gender}', '{$age}', '{$civilstatus}', '{$education}', '{$religion}', '{$offense}', '{$caseNumber}','{$court}, '{$occupation}','{$datecommited}', '{$remarks}'');";
//we are using mysql_query function. it returns a resource on true else False on error

//"INSERT INTO `inmate` (`inmate_id`, `surname`, `firstname`, `middleinitial`, `gender`, `age`, `civilstatus`, `education`, `religion`, `offense`, `case_number`, `court`, `occupation`, `datecommited`, `remarks`) VALUES (NULL, 'san', 'as', 'r', '2', '3', 'single', 'none', 'catholic', 'none', '21', 'iligan', 'number', '2017-01-04', 'ndas')";
mysql_query($sql);

 
 
/*$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('The data is already: ' . mysql_error());
 
}*/

?>
					<script type="text/javascript">
						alert("New Record is Added thank you");
						window.location = "inmate.php";
					</script>
					<?php
//close of connection
mysql_close($conn);
?>