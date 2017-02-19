<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search Inmate</title>

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
                        <a href="home.php">Home</a>
                    </li>
                   
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	<header style="background-color: black">
	

<?php


$searchName = trim($_GET["keyname"]);

if($searchName == "")
{
	echo "Enter name you are searching for.";
	exit();
}


$host = "localhost"; 
$db = "jail"; 
$user = "root"; 
$pwd = ""; 

$link = mysqli_connect($host, $user, $pwd, $db);


$query ="SELECT * FROM inmate WHERE surname LIKE '%$searchName%'";

$results = mysqli_query($link, $query);


if(mysqli_num_rows($results) >= 1)
{
	$output = "";
	while($row = mysqli_fetch_array($results))
		
	{
echo 
		$output .= "<center>";
		$output .= "<table class='table-hover' 	>";
		$output .= "<br />"."<br />"."<br />"."<br />."."<br />"."<br />"."<br />";
		$output .= "Sur Name " . $row['surname'] . "<br />";
		$output .= "First Name " . $row['firstname'] . "<br />";
		$output .= "Middle: " . $row['middleinitial'] . "<br />";
		$output .= "Gender: " . $row['gender'] . "<br />";
		$output .= "Civil Status: " . $row['civilstatus'] . "<br />";
		$output .= "Education " . $row['education'] . "<br />";
		$output .= "Religion " . $row['religion'] . "<br />";
		$output .= "Offense: " . $row['offense'] . "<br />";
		$output .= "Case Number: " . $row['case_number'] . "<br />";
		$output .= "Court" . $row['court'] . "<br />";
		$output .= "Occupation " . $row['occupation'] . "<br/><br/><br/><br/>";
		$output .= "</table>";
		
		$output .= "</center>";
	}
	
	echo $output;
  }
?><<a href="rommel.php?inmate_id=' . mysql_result($result, $i, 'inmate_id')"/ > VISIT</a>
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

