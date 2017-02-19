<?php
	 
	include('dbconnect.php');

	$output = '';  
	$records = array();
	
	if($results = $db->query("SELECT * FROM inmate")){
		if($results->num_rows){
			while ($row = $results->fetch_object()){ 
				$records[] = $row; 
			} 
			$results->free();  		
		} 
		
	}
	
	 
	 
 ?>
 
<html>

<head>
<link rel = "stylesheet" type = "text/css" href = "style/style.css">
<title>Table</title> 
</head>
<body>
	 <header class = "CList">
<p>CUSTOMER RECORD</p>
</header>

 <form   action = "search1.php" method = "POST"> 
			<div class= "search">
				Search Customer name:
				<input type="text" name="search_customer" value="">
				<input type="submit" value="Search" name="submit"> 
			</div>
			</form>
	<br><br><br>
	
<form action = "" method = "POST">
	 
 <?php	
	if(isset ($_POST['submit'])) {
		
		if($_POST['search_customer'] == '') {
			echo '<p align="center">Please enter search keyword</p>'; 
		}
		else {
			$search_customer = $_POST['search_customer'];
		
			$query = mysql_query("SELECT * FROM inmate WHERE surname ='%$search_customer%'");
		
			$count = mysql_num_rows($query);
					
				if($count <= 0){	
					$output = '<p align="center">No result found!</p>';
					echo $output;
				}
				?>
				
			<table class = "table1"> 
				<thead> 
					<tr>  
						<th>Inmate ID</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Last Name:</th>
						<th>Gender</th>
						<th>Age</th>
						<th>Birthday</th> 
						<th>Marital Status</th>
						<th>Address</th> 
						<th>Case Number</th>
						<th>Case Name</th>  
						<th>Date of Imprisonment</th> 
						
					</tr> 
				</thead> 
				<tbody>
				<?php
				while ($row =mysql_fetch_array($query)){
					$id = $row['inmate_id']; 
					$firstname = $row['firstname'];
					$middlename = $row['middlename'];
					$surname = $row['surname']; 
					$gender = $row['gender'];
					$age = $row['age'];
					$birthday = $row['birthday'];
					$down_marital_statusce = $row['marital_status'];
					$address = $row['address'];
					$case_number = $row['case_number'];
					$case_name = $row['case_name'];
					$date = $row['date'];
				?>
					
							
					
						<td> <?php echo  $id;?> </td>
						<td> <?php echo  $firstname;?> </td>
						<td> <?php echo  $middlename;?> </td>
						<td> <?php echo  $surname;?> </td>	
						<td> <?php echo  $gender; ?></td>
						<td> <?php echo  $age; ?></td> 
						<td> <?php echo  $birthday;?></td> 
						<td> <?php echo  $marital_status;?></td>
						<td> <?php echo  $address;?></td> 
						<td> <?php echo  $case_number;?></td>
						<td> <?php echo  $case_name;?></td>
						<td> <?php echo  $date;?></td>
						<td > <?php echo "<a href='rommel.php?inmate_id=$id' class = 'edit'>Visit</a>"; ?> </td>
						<</tr>
				<?php 
				}
				?>  		
				</tbody> 
			</table>
		<?php 
			}
		}else {
		$query = mysql_query("SELECT * FROM inmate") or die("could not search!");
		
			$count = mysql_num_rows($query);
					
				if($count <= 0){	
					$output = '<p align="center">No result found!</p>';
					echo $output;
				}
				?>
				
				<table class = "table1"> 
					<thead> 
						<tr>  
					 		<th>Inmate ID</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Last Name:</th>
						<th>Gender</th>
						<th>Age</th>
						<th>Birthday</th> 
						<th>Marital Status</th>
						<th>Address</th> 
						<th>Case Number</th>
						<th>Case Name</th>  
						<th>Date of Imprisonment</th> 
						</tr> 
					</thead> 
					<tbody>				
				<?php
				while ($row =mysql_fetch_array($query)){	
					$id = $row['inmate_id']; 
					$firstname = $row['firstname'];
					$middlename = $row['middlename'];
					$surname = $row['surname']; 
					$gender = $row['gender'];
					$age = $row['age'];
					$birthday = $row['birthday'];
					$marital_status = $row['marital_status'];
					$address = $row['address'];
					$case_number = $row['case_number'];
					$case_name = $row['case_name'];
					$date = $row['date'];
				?>				
						
							
							<td> <?php echo $id;?> </td>
							<td> <?php echo $firstname;?> </td>
							<td> <?php echo $middlename;?> </td>
							<td> <?php echo $surname;?> </td>	
							<td> <?php echo $gender; ?></td>
							<td> <?php echo $age; ?></td> 
							<td> <?php echo $birthday;?></td> 
							<td> <?php echo $marital_status;?></td>
							<td> <?php echo $address;?></td> 
							<td> <?php echo $case_number;?></td>
							<td> <?php echo $case_name;?></td>
							<td> <?php echo $date;?></td>
							<td> <?php echo "<a href='rommel.php?inmate_id=$id' class = 'edit' >Visit</a>"; ?> </td>
							</tr>
				<?php
				}
				?>
				</tbody> 
			</table>
			<?php
			}  
	?> 
	<br> 
	</form>  
</body>
</html>

 