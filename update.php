<?php
					include('dbconnect.php');
					if(isset($_GET['inmate_id']))
					{
					$id=$_GET['inmate_id'];
					if(isset($_POST['submit']))
					{
						$inid = $_POST['inid'];
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
						
					$query3=mysql_query("update inmate set surname='$surname', firstname='$firstname', middleinitial='$middleinitial', gender='$gender', age='$age', civilstatus='$civilstatus', education='$education', religion='$religion', offense='$offense', case_number='$case_number', court='$court', occupation='$occupation', datecommited='$datecommitted', remarks='$remarks', attorney_name='$attorney_name', attorney_contact='$attorney_contact' where inmate_id='$id'");
					if ($query3){
						if ($remarks == 'Released'){
						?>
						<script>
						
						window.location.href = "datereleased.php?inmate_id=<?php echo $inid ?>"</script>
						<?php
						}
					}
					}
					$query1=mysql_query("select * from inmate where inmate_id='$id'");
					$query2=mysql_fetch_array($query1);
					}
					
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
                <a class="navbar-brand" href="#page-top">View Case Hearing Schedule</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
					<li class="page-scroll">
                        <a href="viewinmate.php">BACK</a>
                    </li>

                    
                </ul>
            </div>
            </div>
        </nav>
    <!-- Header -->
    <header style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					
					<form method="post" action=""  >
						<table class="table table-bordered table-responsive">
						<input type="hidden" class="form-control" name="inid" value="<?php echo $query2['inmate_id']; ?>"/>
						
						<tr class="table-active">
						<td><b>Last Name</b></td>
						<td><input type="text" class="form-control" name="surname" value="<?php echo $query2['surname']; ?>"/></td>
						</tr>
						
						<tr>
						<td><b>First Name</b></td>
						<td><input type="text" class="form-control" name="firstname" value="<?php echo $query2['firstname']; ?>"/></td>
						</tr>
						<tr>
						<td><b>Middle Initial</b></td>
						<td><input type="text" class="form-control" name="middleinitial" value="<?php echo $query2['middleinitial']; ?>"/></td>
						</tr>
						<tr>
						 <td><b>Gender</b></td>
								<td><b><input type="text" class="form-control" name="gender" value="<?php echo $query2['gender']; ?>">
							   </td>
								  </tr>
						<tr>
						<td><b>Age</b></td>
						<td><input type="text" class="form-control" name="age" value="<?php echo $query2['age']; ?>"/>
						</tr>		  
						<tr>
						<td><b>Civil Staus</b></td>
						<td> <input type="text"  name="civilstatus" class="form-control"value="<?php echo $query2['civilstatus']; ?>">
								</td>
								</tr>
						
						<tr>
							<td><b>Education Attainment</b></td>
						<td> <input type="text" class="form-control"  class="form-control"name="education" value="<?php echo $query2['education']; ?>">
								
								</td>
						</tr>
						<tr>
							<td><b>Religion</b></td>
						<td> <input type="text"  name="religion" class="form-control" value="<?php echo $query2['religion']; ?>">
								</td>
								</tr>
						<tr>
						<td><b>Offense</b></td>
						<td><input type="text" class="form-control" name="offense" value="<?php echo $query2['offense']; ?>"/></td>
						</tr>
						<tr>
						<td><b>Case Number</b></td>
						<td><input type="text" class="form-control" name="case_number" value="<?php echo $query2['case_number']; ?>"/></td>
						</tr>
						<tr>
						<td><b>Court</b></td>
						<td><input type="text" class="form-control" name="court" value="<?php echo $query2['court']; ?>"/></td>
						</tr>
						<td><b>Occupation</b></td>
						<td><input type="text" class="form-control" name="occupation" value="<?php echo $query2['occupation']; ?>"/></td>
						</tr>
						<tr>
						<tr>
						<td><b>Date Commited</b></td>
						<td><input type="date" class="form-control" name="datecommited" value="<?php echo $query2['datecommited']; ?>"/></td>
						</tr>
						
						<tr>
						<td><b>Remarks</b></td>
						<td> <input type="text" name="remarks" class="form-control" value="<?php echo $query2['remarks']; ?>">
							</tr>
						
						<tr>
						<td><b>Attorney Name</b></td>
						<td><input type="text" class="form-control" name="attorney_name" value="<?php echo $query2['attorney_name']; ?>"/></td>
						</tr>
						<tr>
						<td><b>Attorney Contact</b></td>
						<td><input type="text" class="form-control" name="attorney_contact" value="<?php echo $query2['attorney_contact']; ?>"/></td>
						</tr>
						<tr>

						   <td><button type="submit" name="submit" class="btn btn-default" >
						   <span class = "glyphicon glyphicon-save"></span> Update</button></td>
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

