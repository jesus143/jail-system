<?php

if(!mysql_connect("localhost","root","1234567890"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("jail"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
$db = new mysqli ('localhost', 'root', '1234567890','jail');



$username = 'mrjesuserwinsuarez@gmail.com';
$password = 'replacement1';
$deviceId = 36605;

?>