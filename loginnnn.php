<?php
    include('dbconnect.php');

	if(isset($_POST['submit'])){
        if(!empty($_POST['user']) && !empty($_POST['pass'])) {
             $username=$_POST['user'];
             $password=$_POST['pass'];

    $query=mysql_query("SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");
    $numrows=mysql_num_rows($query);

    if($numrows!=0)
    {
        while($row=mysql_fetch_assoc($query)){
        $user=$row['username'];
        $pass=$row['password'];
        $name = $row['name'];
		$rank = $row['rank'];
        $usertype = $row['usertype'];
    }
    if($username == $user && $password == $pass)
    {
        if($usertype == officer){
                session_start();
                $_SESSION['sess_user']=$name;
                header("Location: home.php");
        }

        else if($usertype == judge){
                session_start();
                $_SESSION['sess_user']=$name;
                header("Location: judge_home.php");
        }
        else if($usertype == nurse){
                session_start();
                $_SESSION['sess_user']=$name;
                header("Location: nursehome.php");
        }
		else if($usertype == warden){
                session_start();
                $_SESSION['sess_user']=$name;
                header("Location: warden.php");
        }
    }
    }
        else {
        echo "WRONG USERNAME AND PASSWORD!";
    }
}
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
                <!--<ul class="nav navbar-nav navbar-right">
                    
                    <li class="page-scroll">
                        <a href="login1.php">LOGIN</a>
                    </li>
                    
                    
                </ul>-->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<header style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img class="img-responsive" src="img/men.png" alt="">
                    <div class="intro-text">
                        <span class="name">Tipanoy Jail Inmate Monitoring System</span>
                        <hr class="star-light">
                        </div>
                </div>
				<div class="col-lg-6">
                    <div class="intro-text">
                        <span class="name">LOGIN</span>
                        <hr class="star-light">
                        </div>
						<form method="POST" action="">
							<table class="table">
							<tr>
								<td><input type="text" class="form-control" name="user"></td>
							</tr>
							<tr>
								<td><input type="password" class="form-control" name="pass"></td>
							</tr>
							<tr>
								<td><input type="submit" class="form-control" name="submit" value="LOGIN"></td>
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