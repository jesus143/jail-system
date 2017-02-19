<!DOCTYPE html> 
<html>

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
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="#page-top">View INMATE</a>
           </div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						
						<li class="page-scroll">
                        <a href="warden.php">HOME</a>
                    </li>
                    <li class="page-scroll">
                        <button type = "button" class="btn btn-default" onclick = "javascript:window.print()"> 
							<span class = "glyphicon glyphicon-print"></span> Print</button>
							</button>
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
					<div class="col-lg-48">
						
							
					</div>
			</div>
			
		
	<?php

		include('dbconnect.php');
		
		
		$per_page = 10;
		
		
		$result = mysql_query("SELECT * FROM inmate");
		$total_results = mysql_num_rows($result);
		$total_pages = ceil($total_results / $per_page);

		
		if (isset($_GET['page']) && is_numeric($_GET['page']))
		{
			$show_page = $_GET['page'];
			
			
			if ($show_page > 0 && $show_page <= $total_pages)
			{
				$start = ($show_page -1) * $per_page;
				$end = $start + $per_page; 
			}
			else
			{
				
				$start = 0;
				$end = $per_page; 
			}		
		}
		else
		{
			
			$start = 0;
			$end = $per_page; 
		}
		
		
		
		//echo "<p>  <b>View Inmate:</b> ";
		for ($i = 1; $i <= $total_pages; $i++)
		{
			echo "<a href='viewinmate1.php?page=$i'>$i</a> ";
		}
		echo "</p>";
			
		
		
		echo "<table class = 'table'>";
		echo "<tr>  
				<th>Last Name</th> 
				<th>First Name</th>
				<th>Middle Initial</th> 
				<th>Gender</th>
				<th>Age</th> 
				<th>Civil Status</th>
				<th>Education</th> 
				<th>Religion</th>
				<th>Offense</th> 
				<th>Case Number</th> 
				<th>Court</th> 
				<th>Occupation</th>
				<th>Date Commited</th> 
				<th>Remarks</th>
				<th>Date of Released</th>
				
				</tr>";
		
		
		for ($i = $start; $i < $end; $i++)
		{
			
			if ($i == $total_results) { break; }
		
							
			
			echo "<tr>";
			/*echo '<td>' . mysql_result($result, $i, 'name') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'surname') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'firstname') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'middleinitial') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'gender') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'age') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'civilstatus') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'education') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'religion') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'offense') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'case_number') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'court') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'occupation') . '</td>';
			echo '<td>' . mysql_result($result, $i, 'datecommited') . '</td>';*/
			
			$remarks = mysql_result($result, $i, 'remarks');
						
						 
						if($remarks == 'Released') {  
						
								
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'surname') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'firstname') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'middleinitial') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'gender') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'age') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'civilstatus') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'education') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'religion') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'offense') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'case_number') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'court') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'occupation') . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'datecommited') . '</td>';
								echo '<td style = "background-color:red;">' . $remarks . '</td>';
								echo '<td style = "background-color:red;">' . mysql_result($result, $i, 'datereleased') . '</td>';
															
								
							 
						}else{
							
								echo '<td>' . mysql_result($result, $i, 'surname') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'firstname') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'middleinitial') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'gender') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'age') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'civilstatus') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'education') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'religion') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'offense') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'case_number') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'court') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'occupation') . '</td>';
								echo '<td>' . mysql_result($result, $i, 'datecommited') . '</td>';
								echo '<td>' . $remarks . '</td>';
								echo '<td>' . mysql_result($result, $i, 'datereleased') . '</td>';
								
						
						} 					
			echo "</tr>"; 
		}
		
		
		
		
		echo "</table>"; 
		
		
		echo '<b>'."Total Inmates". " ". $total_results. " <br>  ";
		$result = mysql_query("SELECT * FROM inmate where gender ='Male'");
		$totals = mysql_num_rows($result);
		$result = mysql_query("SELECT * FROM inmate where gender ='Female'");
		$total = mysql_num_rows($result);
		
		echo '<b>'."Total Male". " ". $totals. " <br>  ";
		echo '<b>'."FeMale". " ". $total. " <br>  ";
		
		

		
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

 