<?php
require 'dbconnect.php';
require_once('sms/smsGateway.php');
require_once('sms/smsGatewayClass.php');
require_once('sms/mysql_crud.php');


use Sms\SmsGatewayClass;
use Sms\SmsGateway;

if (isset($_POST['submit'])){
	
		 $id = $_GET['inmate_id'];
		 $hearing = $_POST['hearing'];
		 $escort = $_POST['escort'];



	 /************************
	  * Start sms
	  *****************************/

		 // initialized mysql crud database
		 $database = new Database();

		 // connect to mysql database
		 $database->connect();

		 // get vitor info of the inmate
		 $database->select('visitor', '*', null, 'inmate_id = ' . $id);

		 // get result of the visitor info of the inmate
		 $visitorInfo = $database->getResult();

		 // get visitor contact info
		 $visitorNumber = $visitorInfo[0]['contact'];
		$visitorName = $visitorInfo[0]['visitorname'];

		 // set class sms
		 $smsGatewayClass = new SmsGatewayClass($username, $password, $deviceId);

		 // get inmate info
		 $database->select('inmate', '*', null, 'inmate_id = ' . $id);

		 // get result inmate info
		 $inMateInfo = $database->getResult();
		 $attorneyName = $inMateInfo[0]['attorney_name'];
		 $attorneyContact = $inMateInfo[0]['attorney_contact'];


		// compose message for inmate visitor and this is the content of sms to be sent
		 $message = $smsGatewayClass->composeSmsCaseHearingSchedule($visitorInfo, $inMateInfo, $hearing, $escort);

		// send sms to attorney
		$message1  = 'Hi Atty ' . $attorneyName  .  ' ' . $message;
		$smsGatewayClass->send( $message1, [$attorneyContact]);

		// send sms now to visitor
		 $message2  = 'Hi ' . $visitorName  .  ' ' . $message;
		 $smsGatewayClass->send( $message2, [$visitorNumber]);


		// alert success message sms sent
		$smsGatewayClass->alertSuccessSmsSent("Sms notification will arrive to visitor " . $visitorName . ' mobile number ' . $visitorNumber . '  and Atty ' . $attorneyName . '  mobile number ' . $attorneyContact  .' shortly.');


	 /************************
	  * End sms
	  *****************************/



		 $ins =mysql_query("INSERT INTO hearing (inmate_id, hearing, escort) VALUES ('$id', '$hearing','$escort') ");
		if ($ins){
			?>
			<script>
			window.location.href = "judgecase.php";</script>
			<?php
		}
	 }
 
 
 
 if (isset($_GET['inmate_id']) && is_numeric($_GET['inmate_id']) && $_GET['inmate_id'] > 0)
 {
 
	 $id = $_GET['inmate_id'];
	 $result = mysql_query("SELECT * FROM inmate WHERE inmate_id=$id")
	 or die(mysql_error()); 
	 $row = mysql_fetch_array($result);
	 
	 
if($row)
 {
 
	$surname = $row['surname'];
	$firstname = $row['firstname'];
	$middleinitial = $row['middleinitial'];
	$offense = $row['offense'];
	$case_number = $row['case_number'];
	$court = $row['court'];
	$attorney_name = $row['attorney_name'];
	$attorney_contact = $row['attorney_contact'];
	
  }
 else
 
 {
	echo "No results!";
 }
 }
	else
 
 {
	echo 'Error!';
 }
 
?>
<!DOCTYPE HTML >
<html>
<head>
	 <title></title>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tipanoy Jail</title>

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
                <a class="navbar-brand" href="#page-top">Case Hearing Schedule</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="page-scroll">
                        <a href="samok.php">BACK</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	<header style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    

					 <form action="" method="post" class="form" >
							<center>	
								<table class="table">
							
								<tr>
								<td>Name of the Inmate<input type="text" name="surname" class="form-control" value="<?php echo $surname. "," . " ". $firstname. " " . $middleinitial; ?> " /><br/></td>
								</tr>
								<tr>
								<td>Offense<input type="text" name="offense" class="form-control" value="<?php echo $offense; ?> " /><br/></td>
								</tr>
								<tr>
								<td>Case Number<input type="text" name="case_number" class="form-control" value="<?php echo $case_number; ?> " /><br/></td>
								</tr>
								<tr>
								<td>Court<input type="text" name="case_number" class="form-control" value="<?php echo $court; ?> " /><br/></td>
								</tr>
								<tr>
								<td>Name of the Attorney<input type="text" name="attorney_name" class="form-control" value="<?php echo $attorney_name; ?> " /><br/></td>
								</tr>
								<tr>
								<td>Contact Number<input type="text" name="attorney_contact" class="form-control" value="<?php echo $attorney_contact; ?> " /><br/></td>
								</tr>
								<tr>
								<td>Date of Hearing<input type="date" name="hearing" class="form-control" placeholder="Hearing Schedule" /><br/></td>
								</tr>
								<tr>
							
								<td> <select class="form-control" name="escort">
										<option>Select Escort</option>
										<option>SJO4 Ruel Acbayan JMP</option>
										<option>SJO4 Reinhard Tumanda JMP</option>
										<option>SJO1 Rodante Orneza JMP</option>
										<option>SJO1 Rene Boy Pacquiao JMP</option>
										<option>JO3 Dante Armda JMP</option>
										<option>SJO1 Roy Tuarez JMP</option>
										<option>JO3 Jason Barrera JMP</option>
										<option>JO2 Clarissa Bagonoc JMP</option>
										<option>JO2 Crystler Canete JMP</option>
										<option>JO2 Arlinogin Cuizon JMP</option>
										<option>JO2 Ahmad Saycala JMP</option>
										<option>JO2 Jienilyn Turado JMP</option>
										<option>JO1 Elias Cerdena JMP</option>
										<option>JO1 Michael Pamisa JMP</option>
										<option>JO1 Joseph Bartolome JMP</option>
										<option>JO1 Rommel Maglangue JMP</option>
										</td>
								</tr>
								<tr>
									<td><input type="submit" class="form-control" style="background-color: white" name="submit" style="background-color: black" value="Save Changes"></td>
								</tr>
								
									</table>
									</center>
							
						 </form> 
						 
					
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
                        <p>Purok 5. Tipanoy, Iligan City,<br> Philippines.
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

