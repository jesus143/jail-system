<?php 
function logged_in_redirect(){
	if (logged_in() === true){		
		header('Location:home_for_admin.php');
		exit();
	} 
} 
function array_sanitize(&$item){
	$item = mysql_real_escape_string($item); 
} 
function sanitize($data){ 
	return mysql_real_escape_string($data);
} 
function escape($string){ 
	return htmlentities(trim($string), ENT_QUOTES, 'UTF-8');
} 
function output_errors($errors){
	 
	return '<ul class = "red"><p>'. implode('</p><p>', $errors) .'</p></ul>'; 
	//and just the same of this code below 
	//$output = array();
	//foreach($errors as $error){
	//	$output[] = '<li>'. $error. '</li> ';
	//} 
	//return '<ul>'. implode('', $output) .'</ul>';  
} 

?>