
<!DOCTYPE HTML PUBLIC >
<html>
<head>
	<title>View Records</title>
	
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
                <a class="navbar-brand" href="#page-top">View Case Hearing Schedule</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
					<li class="page-scroll">
                        <a href="judge_home.php">HOME</a>
                    </li>

                    
                </ul>
            </div>
            </div>
        </nav>
	
	<header style="background-color: black">
        <div class="container">
            

					<?php

						include('dbconnect.php');

						$result = mysql_query("SELECT * FROM hearing JOIN inmate where inmate.inmate_id = hearing.inmate_id") 
								or die(mysql_error());  
									
																
								echo "<table class='table' style='color:white'>";
								echo "<tr class='table-active'> <th>Inmate Name</th><th>Offense</th> <th>Case Number</th><th>Attorney Name</th><th>Hearing Schedule</th> <th>Escort</th> </tr>";

								
								while($row = mysql_fetch_array( $result )) {
									
									$id = $row['case_id']; 
									
									echo "<tr>";
									
									
									echo '<td>' . $row['surname'] . ", " .$row['firstname']. " " . $row['middleinitial'].'</td>';
									echo '<td>' . $row['offense'] . '</td>';
									echo '<td>' . $row['case_number'] . '</td>';
									echo '<td>' . $row['attorney_name'] . '</td>';                                                                                               
									echo '<td>' . $row['hearing'] . '</td>';
									echo '<td>' . $row['escort'] . '</td>';
									echo '<td>' ."<a href='update2.php?case_id=$id'>Update</a>". '</td>';									
					
									echo "</tr>"; 
								} 

								
								echo "</table>";
							?>
							
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


</body>
</html>	
