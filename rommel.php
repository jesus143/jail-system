 <?php
 



 
 require 'dbconnect.php';
 
 if (isset($_POST['submit'])){ 
	
		 $id = $_GET['inmate_id'];
		 $attorney_name= $_POST['attorney_name'];
		 
		 $ins =mysql_query(" INSERT INTO attinmate(inmate_id, attorney_name) VALUES ('$id', '$attorney_name') ");
		
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
                <a class="navbar-brand" href="#page-top">Iligan City Jail</a>
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
                    
	<center>
	<!-- <?php 
		$var=mysql_query("SELECT * FROM inmate where inmate_id='$id'");
		$var2=mysql_fetch_array($var);
		
		$attorney=mysql_query("SELECT * FROM attorney");
	
	 ?> --> 
 
	 
	 <form action="" method="post" class="form" >
				
				<table class="table">
				<tr>
				<td>  <input type="text" name="inmatename" class="form-control" value="<?php echo $surname. ",". " ". "$firstname". " ". "$middleinitial"; ?>" /><br/></td>
				</tr>
				<tr>
				<td>  <input type="text" name="offense" class="form-control" value="<?php echo $offense; ?>" /><br/></td>
				</tr>
				<tr>
				<td>  <input type="text" name="case_number" class="form-control" value="<?php echo $case_number; ?>" /><br/></td>
				</tr>
				<tr>
				<td>  <input type="text" name="attorney_name" class="form-control" placeholder="Attorney Name"/><br/></td>
				</tr>
				<!--
				<tr> 
					<td><p>Select Attorney Name:</p><select class="form-control" style="color: black" name="attornyy" required>
						<?php
							while($att = mysql_fetch_array($attorney)){
								?>
									<option style="color: black" value="<?php echo $att['attorney_id']?>"><?php echo $att['attorney_name']?></option>
								<?php
								
							}
						?></td>
					</select>-->
				</tr>
							<tr>
							<td><input type="submit" class="form-control" style="background-color: white" name="submit" style="background-color: black" value="Save Changes"></td>
							</tr>
					</table>
					
			
		 </form> 
		 </center>
	
	</div>
	</div>
	</header>
 </body>
 </html> 

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
    