<!DOCTYPE html> 
<html>

<head>
<title>Table</title>
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
                        <a href="nursehome.php">HOME</a>
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
          			
				</div>
		</div>
<?php
	 
	include('dbconnect.php');

	$output = '';  
	$records = array();
	
	if($results = $db->query("SELECT * FROM inmate")){
		if($results->num_rows){
			while ($row = $results->fetch_object()){ 
				$records[] = $row; 
			} 
			$results->free();  		
		} 
		
	}
	 
	 
 ?>
 

	

 <form   action = "viewer.php" method = "POST"> 
			<div class= "search">
			<label>SEARCH INMATE
			
				<input type="text" name="search_customer" value="" class="form-control">
				</label>
				<button type="submit" value="Search" name="submit" class="btn btn-default"> 
				<i class="glyphicon glyphicon-search"></i>
				</button>
				
			</div>
			</form>
	<br><br><br>
	
<form action = "" method = "POST">
	 
 <?php	
	if(isset ($_POST['submit'])) {
		
		if($_POST['search_customer'] == '') {
			echo '<p align="center">Please enter search keyword</p>'; 
		}
		else {
			$search_customer = $_POST['search_customer'];
		
			$query = mysql_query("SELECT * FROM inmate WHERE surname LIKE '%$search_customer%'") or die("could not search!");
		
			$count = mysql_num_rows($query);
					
				if($count <= 0){	
					$output = '<p align="center">No result found!</p>';
					echo $output;
				}
				?>
				
				
			<table class = "table"> 
				<thead> 
					<tr>  
						<th>Inmate Name </th>
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
						<th>Health Information</th>
						
					</tr> 
				</thead> 
				<tbody>
				<?php
				while ($row =mysql_fetch_array($query)){	
					$id = $row['inmate_id']; 
					$surname = $row['surname'];
					$firstname = $row['firstname'];
					$middleinitial = $row['middleinitial']; 
					$gender = $row['gender'];
					$age = $row['age'];
					$civilstatus = $row['civilstatus'];
					$education = $row['education'];
					$religion = $row['religion'];
					$offense = $row['offense'];
					$case_number = $row['case_number'];
					$court = $row['court'];
					$occupation = $row['occupation'];
					$datecommited = $row['datecommited'];
					$remarks = $row['remarks'];
					
				?>
					
							
					
					
						<td> <?php echo  $surname. ",". " ". "$firstname". " ". "$middleinitial";?> </td>
						<td> <?php echo  $gender; ?></td>
						<td> <?php echo  $age; ?></td> 
						<td> <?php echo  $civilstatus;?></td> 
						<td> <?php echo  $education;?></td>
						<td> <?php echo  $religion;?></td> 
						<td> <?php echo  $offense;?></td>
						<td> <?php echo  $case_number;?></td> 
						<td> <?php echo  $court;?></td>
						<td> <?php echo  $occupation;?></td>
						<td> <?php echo  $datecommited;?></td>
						<td> <?php echo  $remarks;?></td>
						<td > <?php echo "<a href='healthinfo.php?inmate_id=$id' >Health Information</a>"; ?> </td>
						
											
					</tr>
				<?php 
				}
				?>  		
				</tbody> 
			</table>
		<?php 
			}
		}else {
		$query = mysql_query("SELECT * FROM inmate") or die("could not search!");
		
			$count = mysql_num_rows($query);
					
				if($count <= 0){	
					$output = '<p align="center">No result found!</p>';
					echo $output;
				}
				?>
				
				<table class = "table"> 
					<thead> 
						<tr>  
							<th>Inmate Name </th>
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
							<th>Health Information</th>
						</tr> 
					</thead> 
					<tbody>				
				<?php
				while ($row =mysql_fetch_array($query)){	
					$id = $row['inmate_id'];
					$surname = $row['surname'];
					$firstname = $row['firstname'];
					$middleinitial = $row['middleinitial']; 
					$gender = $row['gender'];
					$age = $row['age'];
					$civilstatus = $row['civilstatus'];
					$education = $row['education'];
					$religion = $row['religion'];
					$offense = $row['offense'];
					$case_number = $row['case_number'];
					$court = $row['court'];
					$occupation = $row['occupation'];
					$datecommited = $row['datecommited'];
					$remarks = $row['remarks'];
				?>				
						
						
							<td> <?php echo  $surname. ",". " ". "$firstname". " ". "$middleinitial";?> </td>
							<td> <?php echo $gender; ?></td>
							<td> <?php echo $age; ?></td> 
							<td> <?php echo $civilstatus;?></td> 
							<td> <?php echo $education;?></td>
							<td> <?php echo $religion;?></td> 
							<td> <?php echo $offense;?></td>
							<td> <?php echo $case_number;?></td>
							<td> <?php echo $court;?></td>
							<td> <?php echo $occupation;?></td>
							<td> <?php echo $datecommited;?></td>
							<td> <?php echo $remarks;?></td>
							<td> <?php echo "<a href='healthinfo.php?inmate_id=$id' class = 'edit' >Health Information</a>"; ?> </td>
							
									
						</tr>
				<?php
				}
				?>
				</tbody> 
			</table>
			<?php
			}  
	?> 
	<br> 
	</form>  

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




 