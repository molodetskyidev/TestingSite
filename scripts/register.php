<?php
include("class_lib.php"); 
ini_set('display_errors',1);
error_reporting(E_ALL); 
date_default_timezone_set('Europe/Kiev');
$db=new db();
$conn=$db->initDb();
$username=check_data($_POST["username"]);
$password=check_data($_POST["password"]);
$salt = openssl_random_pseudo_bytes(22); 
$salt = '$2a$%13'. strtr(base64_encode($salt), array('_' => '.', '~' => '/'));
$password_hash = crypt($password, $salt);
$name=check_data($_POST["name"]);
$surname=check_data($_POST["surname"]);
$sex=$_POST["sex"];
$date_of_birth="1987-11-21";
$date_of_registration=date("Y-m-d");
$email=$_POST["email"];
$date_of_birth=check_data($_POST["date_of_birth"]);
//TODO think how to implement path to the file and loading the file
$picture="none";
$db->registerUser($username, $password_hash, $name, $surname, $sex, $date_of_birth, $date_of_registration, $email, $picture, $conn);
 echo "</br><a href='../html/login.html'>Go to Login page</a>";
 $db->closeConnection($conn);
 function check_data($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>