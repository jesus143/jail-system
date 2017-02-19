<?php
	
	include('dbconnect.php');
		 

	
if(empty($_POST) === false ){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
		if(empty($username) === true || empty($password) === true){
			
			$errors[] = 'You need to enter a username and password';
		}else if(user_exists($username) === false){
			
			$errors[] = 'We can\'t fint that username. Have you registered? ';
		}else {
			
			if (strlen($password) > 20){
				$errors[] = 'Password too long'; 
			}
			
			
			$login = login($username,$password);
			
			if($login === false ){
				$errors[] = 'That username/password is incorrect';
				
			}else { 
				$_SESSION['personnel_id'] = $login;
				 
				$results = $db->query("SELECT * FROM jail_officer WHERE officer_id = $login"); 
			
				foreach($results as $r){
				$_SESSION['name'] = $r['name']; 
				$_SESSION['position'] = $r['position'];
				}
				 
				header('Location:home.php');
				exit();	
				}
	
	
		} 
		

		
	}else {
		//$errors[] = 'No data received'; 
	}
	
	
 ?>
 	
