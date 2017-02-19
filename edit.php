<?php 
	
	
	require 'dbconnect.php';
	require 'sec.php';
	
	 
	$id = $_GET['inmate_id'];  
	$error = '';
	$records = array();
	 
	if($results = $db->query("SELECT * FROM inmate WHERE inmate_id = $id ")){
		if($results->num_rows){
			while ($row = $results->fetch_object()){
				 
				$records[] = $row; 				
			}
			$results->free();
		}
	}
	
	if(!empty($_POST)){
	 	
		if(isset($_POST['firstname'], $_POST['middlename'], 
		$_POST['surname'], $_POST['gender'], $_POST['age'], 
		$_POST['birthday'], $_POST['marital_status'], 
		$_POST['address'], $_POST['case_number'], 
		$_POST['case_name'], $_POST['date'])){
	 	
				$firstname  = trim($_POST['firstname']);
				$middlename = trim($_POST['middlename']);
				$surname	= trim($_POST['surname']);
				$gender 	= trim($_POST['gender']);
				$age  		= trim($_POST['age']);
				$birthday 	= trim($_POST['birthday']); 
				$marital_status	 = trim($_POST['marital_status']);
				$address 	= trim($_POST['address']);
				$case_number	 = trim($_POST['case_number']);
				$case_name 	= trim($_POST['case_name']);
				$date 	= trim($_POST['date']);
				
				
				
			$query = $db->query("SELECT * FROM inmate WHERE inmate_id = $id");
				
				
				
				if(!empty($firstname) && !empty($middlename) && !empty($surname) && !empty($gender) &&  !empty($age) && !empty($birthday) && !empty($marital_status)&& !empty($address)&& !empty($case_number)&& !empty($case_name)&& !empty($date)){
		 
					$insert = $db->prepare("UPDATE inmate SET firstname = '$firstname' ,middlename = '$middlename' , surname = $surname, gender = '$gender', age = '$age', birthday = $birthday, marital_status = '$marital_status', address = '$address', case_number = $case_number, case_name = $case_name, date = $date   WHERE id = $id");
					//$insert->bind_param('ssissss', $name, $address, $contact_number, $venue, $events,$due_time,$due_date);
	 
	 
 					 	if($insert->execute()){						
					 	header('Location:table.php');
					 	die(); 
					 }
					
				}else {
					$error = 'error';
					}	
				}
			}		
	  
	
?>

<html>
<head>


<title>Inmate</title>

</head>
	<body>
		 
	 
	
					 
					
				<form action = "" method = "POST"> 	
	<?php
		
		if(!count($records)){
			echo 'No records '; 
		}
		else{
		?>	 
			
				<table> 
					<thead> 
						<tr>  
					 	 	
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Surname </th>
							<th>Gender</th>
							<th>Age</th>
							<th> Birthday</th> 
							<th>Marital Status</th>
							<th>Addres </th> 
							<th>Case Number</th>
							<th>Case Name</th> 
							<th>Date</th>
														
						</tr> 
					</thead> 
					<tbody>
					<?php
					foreach($records as $r){
					?>
						<tr> 
							<td><input type = "text" name = "firstname" value = "<?php echo escape ($r->firstname);?>"></td>
							<td><input type = "text" name = "middle_name" value = "<?php echo escape ($r->middlename);?>"></td>
							<td><input type = "text" name = "surname" value = "<?php echo escape ($r->surname);?>"></td>	
							<td><input type = "text" name = "gender" value = "<?php echo escape ($r->gender);?>"></td>	
							<td><input type = "text" name = "age" value = "<?php echo escape ($r->age);?>"></td>	
							<td><input type = "text" name = "birthday" value = "<?php echo escape ($r->birthday);?>"></td>	
							<td><input type = "text" name = "marital_status" value = "<?php echo escape ($r->marital_status);?>"></td>
							<td><input type = "text" name = "address" value = "<?php echo escape ($r->address);?>"></td>
							<td><input type = "text" name = "case_number" value = "<?php echo escape ($r->case_number);?>"></td>	
							<td><input type = "text" name = "case_name" value = "<?php echo escape ($r->case_name);?>"></td>	
							<td><input type = "date" name = "date" value = "<?php echo escape ($r->date);?>"></td>	
							
							</tr>
					<?php 
					}
					?>  		
					</tbody> 
				</table>
		<?php
			
			}
			
		?>
			<hr> 
			 
 	 					   
						<div > 
						<input type = "submit" value = "Done Edit" >
						</div>
 		
				</form>
				
			 <h1><?php print($error);?></h1>
			 
 	</body>	
	</html>
 