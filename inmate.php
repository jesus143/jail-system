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
			 
			 
			 
	
   $stmt = mysql_query("INSERT INTO `inmate`(`inmate_id`,`surname`,`firstname`,`middleinitial`,
   `gender`,`age`,`civilstatus`,`education`,`religion`,
   `offense`,`case_number`,`court`,`occupation`, 
   `remarks`,`attorney_name`,`attorney_contact`, `user_image`,`datecommited`) 
   VALUES(NULL,'$surname','$firstname','$middleinitial','$gender','$age','$civilstatus','$education','$religion','$offense','$case_number','$court','$occupation' ,'$remarks','$attorney_name',
   '$attorney_contact','$userpic','$datecommitted')");
   if ($stmt){
			?>
			<script>
			window.location.href = "viewinmate.php";</script>
			<?php
		}
   
   
  

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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iligan City Jail</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/rommel.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Iligan City Jail</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="page-scroll">
                        <a href="viewinmate.php">BACK</a>
                    </li>
                   
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
						<table class="table table-bordered table-responsive">
						
						
						<tr class="table-active">
						<td><b>Last Name</b></td>
						<td><input type="text" class="form-control" name="surname" /></td>
						</tr>
						
						<tr>
						<td><b>First Name</b></td>
						<td><input type="text" class="form-control" name="firstname" /></td>
						</tr>
						<tr>
						<td><b>Middle Initial</b></td>
						<td><input type="text" class="form-control" name="middleinitial"/>
						</tr>
						<tr>
						 <td><b>Gender</b></td>
								<td><b><input type="radio" class="form-check-input" name="gender" value="Male" checked="checked">
								Male <input type="radio" class="form-check-input" name="gender" value="Female"></b>
							   <b>Female</b></td>
								  </tr>
						<tr>
						<td><b>Age</b></td>
						<td><input type="text" class="form-control" name="age"/>
						</tr>		  
						<tr>
						<td><b>Civil Staus</b></td>
						<td> <select class="form-control" name="civilstatus">
								<option>*Civil Status</option>
								<option>Single</option>
								<option>Married</option>
								<option>Separated</option>
								<option>Live In</option></td>
								</tr>
						
						<tr>
							<td><b>Education Attainment</b></td>
						<td> <select class="form-control" name="education">
								<option>*Educational Attainment</option>
								<option>Grade 1</option>
								<option>Grade 2</option>
								<option>Grade 3</option>
								<option>Grade 4</option>
								<option>Grade 5</option>
								<option>Grade 6</option>
								<option>Elementary Grad</option>
								<option>First year HS</option>
								<option>Second year HS</option>
								<option>Third year HS</option>
								<option>Fourth year HS</option>
								<option>HS Grad</option>
								<option>First year College</option>
								<option>Second year College</option>
								<option>Third year College</option>
								<option>Fourth year College</option>
								<option>Vocational Grad</option>
								<option>College Grad</option>
								</td>
						</tr>
						<tr>
							<td><b>Religion</b></td>
						<td> <select class="form-control" name="religion">
								<option>*Religion</option>
								<option>Roman Catholic</option>
								<option>Islam</option>
								<option>Born Again</option>
								<option>Iglesia ni Cristo</option>
								<option>Seventh Day Adventist</option></td>
								</tr>
						<tr>
						<td><b>Offense</b></td>
						<td><input type="text" class="form-control" name="offense" /></td>
						</tr>
						<tr>
						<td><b>Case Number</b></td>
						<td><input type="text" class="form-control" name="case_number" /></td>
						</tr>
						<tr>
						<td><b>Court</b></td>
						<td><input type="text" class="form-control" name="court" /></td>
						</tr>
						<td><b>Occupation</b></td>
						<td><input type="text" class="form-control" name="occupation" /></td>
						</tr>
						<tr>
						<tr>
						<td><b>Date Commited</b></td>
						<td><input type="date" class="form-control" name="datecommited" /></td>
						</tr>
						
						<tr>
						<td><b>Remarks</b></td>
						<td> <select class="form-control" name="remarks">
								<option>*Remarks</option>
								<option>Sentenced</option>
								<option>Detained</option>
								<option>Released</option>
								</td>
								</tr>
						
						<tr>
						<td><b>Attorney Name</b></td>
						<td><input type="text" class="form-control" name="attorney_name" /></td>
						</tr>
						<tr>
						<td><b>Attorney Contact</b></td>
						<td><input type="text" class="form-control" name="attorney_contact" /></td>
						</tr>
						
						<tr>
						 <td><label class="control-label">Inmate Image.</label></td>
							<td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
						</tr>
						<tr>

						   <td><button type="submit" name="btnsave" class="btn btn-default" >
						   <span class = "glyphicon glyphicon-save"></span> Save</button></td>
						 </tr>
						</table>
		</form>
    
		



	</div>
            </div>
        </div>
    </header>

    
    

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-12">
                        <h3>Location</h3>
                        <p>Brgy. Tipanoy, Iligan City,<br> Philippines.
                            9200</p>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; RomLiz 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

	
	</body>

</html>

