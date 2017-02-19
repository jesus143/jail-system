<?php
 //error_reporting( ~E_NOTICE ); // avoid notice
 //require_once 'dbconfig.php';

 
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
  
 $errMSG   = "";
 $imgFile  = "";
if(isset($_POST['btnsave']))
{
		
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$middleinitial = $_POST['middleinitial'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$civilstatus = $_POST['civilstatus'];
	$education = $_POST['education'];
	$religion = $_POST['religion'];
	$offense = $_POST['offense'];
	$case_number = $_POST['case_number'];
	$court = $_POST['court'];
	$occupation = $_POST['occupation'];
	$datecommitted = $_POST['datecommited'];
	$remarks = $_POST['remarks'];
	$attorney_name = $_POST['attorney_name'];
	$attorney_contact = $_POST['attorney_contact'];

  
	$imgFile = $_FILES['user_image']['name'];
  //$imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];
  
  
	if(empty($surname)){
   $errMSG = "Please Enter Last Name.";
  }
  else if(empty($firstname)){
   $errMSG = "Please Enter Your First Name.";
  }
  else if(empty($middleinitial)){
   $errMSG = "Please Enter Your Middle Initial.";
  }
  else if(empty($gender)){
   $errMSG = "Please Enter Your Gender.";
  }
  else if(empty($age)){
   $errMSG = "Please Enter Your Age.";
  }
  else if(empty($civilstatus)){
   $errMSG = "Please Enter Your Civil Status.";
  }
  else if(empty($education)){
   $errMSG = "Please Enter Your Education.";
  }
  else if(empty($religion)){
   $errMSG = "Please Enter Your Religion.";
  }
  else if(empty($offense)){
   $errMSG = "Please Enter Your Offense.";
  }
  else if(empty($case_number)){
   $errMSG = "Please Enter Your Case Number.";
  }
  else if(empty($court)){
   $errMSG = "Please Enter Your Court.";
  }
  else if(empty($occupation)){
   $errMSG = "Please Enter Your Occupation.";
  }
 else if(empty($datecommitted)){
   $errMSG = "Please Enter Date Committed.";
  }
  else if(empty($remarks)){
   $errMSG = "Please Enter Remarks.";
  }
  else if(empty($attorney_name)){
   $errMSG = "Please Enter Attorney Name.";
  }
  else if(empty($attorney_contact)){
   $errMSG = "Please Enter Your Attorney Contact.";
  }
  else if(empty($imgFile)){
   $errMSG = "Please Select Image File.";
  }
  else
 {
   $upload_dir = 'user_images/'; // upload directory
	
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
		$uloads  = move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			 
			 
			 
			 
			 
   /*$stmt = $DB_con->prepare('INSERT INTO 
   inmate(surname,firstname,middleinitial,
   gender,age,civilstatus,education,religion,
   offense,case_number,court,occupation,datecommited,
   remarks,attorney_name,attorney_contact, user_image) 
   
   VALUES( :ulname, :ufname, :umname, :ugender, 
   :uage, :ucivilstatus, :ueducation, :ureligion, 
   :uoffense, :ucaseNumber, 
   :ucourt, :uoccupation, :udatecommited, 
   :uremarks, :uattorney_name, 
   :uattorney_contact, :upic)');
   */ 
   $stmt = mysql_query("INSERT INTO `inmate`(`inmate_id`,`surname`,`firstname`,`middleinitial`,
   `gender`,`age`,`civilstatus`,`education`,`religion`,
   `offense`,`case_number`,`court`,`occupation`, 
   `remarks`,`attorney_name`,`attorney_contact`, `user_image`,`datecommited`) 
   VALUES(NULL,'$surname','$firstname','$middleinitial','$gender','$age','$civilstatus','$education','$religion','$offense','$case_number','$court','$occupation' ,'$remarks','$attorney_name',
   '$attorney_contact','$imgFile','$datecommitted')");
   
   /*
   $stmt->bindParam(':ulname',$surname);
   $stmt->bindParam(':ufname',$firstname);
   $stmt->bindParam(':mname',$middleinitial);
   $stmt->bindParam(':ugender',$gender);
   $stmt->bindParam(':uage',$age);
   $stmt->bindParam(':ucivilstatus',$civilstatus);
   $stmt->bindParam(':ueducation',$education);
   $stmt->bindParam(':ureligion',$religion);
   $stmt->bindParam(':uoffense',$offense);
   $stmt->bindParam(':ucaseNumber',$case_number);
   $stmt->bindParam(':ucourt',$court);
   $stmt->bindParam(':uoccupation',$occupation);
   $stmt->bindParam(':udatecommited',$datecommited);
   $stmt->bindParam(':uremarks',$remarks);
   $stmt->bindParam(':uattorney_name',$attorney_name);
   $stmt->bindParam(':uattorney_contact',$attorney_contact);
   $stmt->bindParam(':upic',$imgFile);//image
   */ 



   }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
  }
  
	
	 
 }
 
 
 echo $errMSG;
?>