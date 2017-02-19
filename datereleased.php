 <?php
 



 
 require 'dbconnect.php';
 $id2 = $_GET['inmate_id'];
 $select  = mysql_query("SELECT * FROM inmate where inmate_id='$id2' ");
		 $sel = mysql_fetch_array($select);
 if (isset($_POST['submit'])){ 
	
		 
		 $select  = mysql_query("SELECT * FROM inmate where inmate_id='$id2' ");
		 $sel = mysql_fetch_array($select);
		 $datereleased = $_POST['datereleased'];
		 $ins =mysql_query("update inmate set  datereleased='$datereleased' where inmate_id='$id2'");
		if ($ins){
			?>
			<script>
			window.location.href = "viewinmate.php";</script>
			<?php
		}
	 }
 
 
 
 if (isset($_GET['inmate_id']) && is_numeric($_GET['inmate_id']) && $_GET['inmate_id'] > 0)
 {
 
	 $id = $_GET['inmate_id'];
	 $result = mysql_query("SELECT * FROM inmate WHERE inmate_id='$id'")
	 or die(mysql_error()); 
	 $row = mysql_fetch_array($result);
	 
	 
if($row)
 {
 
	$surname = $row['surname'];
	$firstname = $row['firstname'];
	$middleinitial = $row['middleinitial'];
	
	
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
                <a class="navbar-brand" href="#page-top">Case Hearing Schedule</a>
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
	<header style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    

					 <form action="" method="post" class="form" >
							<center>	
								<table class="table">
							
								<tr>
								<td>Name of the Inmate<input type="text" name="surname" class="form-control" value="<?php echo $sel['surname']; ?> " /><br/></td>
								</tr>
								<tr>
								<td>Released <input type="date" name="datereleased" class="form-control" placeholder="Date of Released" required/><br/></td>
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

