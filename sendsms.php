<?php
require('textlocal.class.php');
require('dbconnect.php');

$textlocal = new Textlocal('sanchezrommel22@gmail.com', '09354056909Jr');

$numbers = array(639272154564);
$sender = 'te naka send nko';
$message = 'This is a message';

try {
    $result = $textlocal->sendSms($numbers, $sender, $message);
    print_r($result);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>