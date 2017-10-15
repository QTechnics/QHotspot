<?php 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);

session_start(); 

require_once ("inc/db_settings.php");

$username = $_POST['username'];
$password = $_POST['password'];

$guvenli_parola = $password;
$sorgu=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ghost_users WHERE username='$username'"));

if (($username!="" || $guvenli_parola!="") && ($username==$sorgu['username'] && $guvenli_parola==$sorgu['password'])){

$_SESSION['giris'] ="admin"; 
$_SESSION['username']=$username;
header("location:index.php");
}
else{
header("location:Message.php?id=Login");
}




?>