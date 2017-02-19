 <?php
 



 
 require 'dbconnect.php';
 $id = $_GET['gcta_id'];
 $var  = mysql_query("SELECT * FROM gcta JOIN inmate where inmate.inmate_id = gcta.inmate_id AND gcta.gcta_id  = '$id'"); 
 $var2  = mysql_fetch_array($var);
 if (isset($_POST['submit'])){ 
 
		$id2 = $_POST['gcta_id'];
		 $sentenced = $_POST['sentenced'];
		 $gcta = $_POST['gcta'];
		 $tasm = $_POST['tasm'];
		 $stal = $_POST['stal'];
		 $preventive = $_POST['preventive'];
		 $earned = $_POST['earned'];
		 $total = $gcta + $tasm + $stal;
		 $earned2 = $total + $earned;
		 $var  = mysql_query("SELECT * FROM inmate where inmate_id  = '$id'"); 
		 $var2  = mysql_fetch_array($var);
		 $datecommited = $var2['datecommited'];
		 date_default_timezone_set('Asia/Manila');
		 $dateofentry = date("Y-m-d");
		$Date = $datecommited;
		$original = date('Y-m-d', strtotime($Date. ' + '.$sentenced.' years'));
		/*$original = new DateTime($original);
		$original->modify('+'.$sentenced.' years');*/
		$tot = $earned + $preventive;
		$dates = $original;
		$adjusted = date('Y-m-d', strtotime($dates. ' - '.$tot.' days'));
		 $ins =mysql_query("UPDATE gcta SET sentenced='$sentenced', gcta='$gcta', tasm='$tasm', stal='$stal', preventive='$preventive', earned='$earned', total='$total', earned2='$earned2', original='$original', adjusted='$adjusted', dateofentry ='$dateofentry' where gcta_id='$id' ");
		 if ($ins){
			?>
			<script>
			window.location.href = "viewgcta.php";</script>
			<?php
		}
			
		
		}
		
		$query1=mysql_query("select * from gcta where gcta_id = '$id'");
					$ins3=mysql_fetch_array($query1);
					
		
					

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
                <a class="navbar-brand" href="#page-top">Edit Inmate GCTA</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
					<li class="page-scroll">
                        <a href="viewgcta.php">HOME</a>
                    </li>

                    
                </ul>
            </div>
            </div>
        </nav>
    
	<header style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
					
					 
				 
					 
					 <form action="" method="post" class="form" >
								<center>
								<table class="table">
								<input type="hidden" name="gcta_id" class="form-control" value="<?php echo $var2['inmate_id']; ?> " /><br/>
								<tr>
								<td><label>Inmate Name</label><input type="text" name="surname" class="form-control" value="<?php echo $var2['surname'].", ". $var2['firstname']. " ". $var2['middleinitial']."."; ?> " /><br/></td>
								</tr>
								<td><label>Date Committed</label><input type="text" name="datecommited" class="form-control" value="<?php echo $var2['datecommited']; ?> " /><br/></td>
								</tr>
								<tr>
								<td><label>Period of Sentenced</label><input type="text" name="sentenced" class="form-control" value="<?php echo $ins3['sentenced']; ?>" /><br/></td>
								</tr>
								<tr>
								<td><label>GCTA Earned</label><input type="number" name="gcta" class="form-control" value="<?php echo $ins3['gcta']; ?>"/><br/></td>
								</tr>
								<tr>
								<td><label>TASTM Earned</label><input type="number" name="tasm" class="form-control" value="<?php echo $ins3['tasm']; ?>"/><br/></td>
								</tr>
								<tr>
								<td><label>STAL Earned</label><input type="number" name="stal" class="form-control" value="<?php echo $ins3['stal']; ?>"/><br/></td>
								</tr>
								<!--<tr>
								<td><input type="number" name="total" class="form-control" placeholder="Total Time Allowance" /><br/></td>
								</tr>-->
								<tr>
								<td><label>Total Preventive Imprisonment</label><input type="number" name="preventive" class="form-control" value="<?php echo $ins3['preventive']; ?>"/><br/></td>
								</tr>
								<!--<tr>
								<td><input type="date" name="original" class="form-control" placeholder="Original Expected Release" required/><br/></td>
								</tr>
								<tr>
								<td><input type="date" name="adjusted" class="form-control" placeholder="Adjusted Expected Release"/><br/></td>
								</tr>-->
								<tr>
								<td><label>Total GCTA Earned Last Month</label><input type="text" name="earned" class="form-control" value="<?php echo $ins3['earned2']; ?>" /><br/></td>
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

