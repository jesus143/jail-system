<?php
 error_reporting( ~E_NOTICE ); // avoid notice
 require_once 'dbconfig.php';
 
 if(isset($_POST['btnsave']))
 {
  $surname = $_POST['surname'];// user name
  $firstname = $_POST['firstname'];// user email
  $middleinitial = $_POST['middleinitial'];// user name
  $gender = $_POST['gender']

 
  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];
  
  
  
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
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
  }
  
  
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $stmt = $DB_con->prepare('INSERT INTO inmate( surname,firstname,middleinitial,gender, age, user_image) VALUES(:usurname, :ufirstname, :umiddlename, :ugender, :userpic )');
   $stmt->bindParam(':usurname',$surname);
   $stmt->bindParam(':ufistname',$fistname);
   $stmt->bindParam(':umiddleinitial',$middleinitial);
   $stmt->bindParam(':ugender',$gender);
   $stmt->bindParam(':userpic',$userpic);
   
   if($stmt->execute())
   {
    $successMSG = "new record succesfully inserted ...";
    header("refresh:5;index.php"); // redirects image view page after 5 seconds.
   }
   else
   {
    $errMSG = "error while inserting....";
   }
  }
 
?>