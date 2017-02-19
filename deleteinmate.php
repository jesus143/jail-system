<html>
<head>
  <title>Delete Inmate</title>
  <link rel="stylesheet" media="screen" href="login.css" >
</head>
<body>
	<table align='center' border='0' bgcolor='green' width='1200' cellpadding='8' cellspacing='0' height='200'>
        
          <tr>
            <td colspan="3" bgcolor='#999999' valign='center'>

<?php
ob_start();
$link=mysql_connect("localhost","root","");
mysql_select_db("jail",$link);
$result=mysql_query("select * from inmate");
?>


<?php

//To delete:
if(isset($_POST["delete"])){
$id=$_POST["id"];
$delete=mysql_query("delete from inmate where inmate_id='$_POST[id]'");
if($delete){
print "<script language=\"javascript\">
	alert(\"Successfully deleted!...\")
	location.href=\"deleteinmate.php\"
	</script>";
}
else{
print "<script language=\"javascript\">
	alert(\"Not deleted!...\")
	location.href=\"deleteinmate.php\"
	</script>";
}
}
?>



<?php

print "<table width='100%' border='0' cellpadding='3' cellspacing='2' bgcolor='green'>
<caption><b>DELETE INMATE RECORD</b></caption>
<tr bgcolor='green'>

<th width='10%'>First Name</th>
<th width='15%'>Middle Name</th>
<th width='15%'>Surname</th>
<th width='10%'>Gender</th>
<th width='10%'>Age</th>
<th width='10%'>Birthday</th>
<th width='10%'>Marital Status</th>
<th width='3%'>Address</th>
<th width='10%'>Case Number</th>
<th width='15%'>Case Name</th>
<th width='10%'>Date</th>



</tr>";
$i=1;
while($row=mysql_fetch_array($result)){
print "<form method=POST>";
print"<tr bgcolor='white'>

<td>$row[firstname]</td>
<td>$row[middlename]</td>
<td>$row[surname]</td>
<td>$row[gender]</td>
<td>$row[age]</td>
<td>$row[birthday]</td>
<td>$row[marital_status]</td>
<td>$row[address]</td>
<td>$row[case_number]</td>
<td>$row[case_name]</td>
<td>$row[date]</td>


<td align='center'><input type=submit name=delete value=delete></td>
</tr>";
print "</form>";
$i++;
}
print"</table>";
?>

<br/>

			</td>
          </tr>
          <tr>
		  <td align="center"><a href="viewinmate.php" target="_parent">Back <b>|</b></a>
			<a href="deleteinmate.php" target="_parent">Delete Inmate <b>|</b></a>
			
          </tr>
          
	</table>
</body>
</head>
</html>

