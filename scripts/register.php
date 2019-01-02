<?php
include("class_lib.php"); 
ini_set('display_errors',1);
error_reporting(E_ALL);
 
$db=new db();
$conn=$db->initDb();
$username="test";
$password="test";
$salt = openssl_random_pseudo_bytes(22); 
$salt = '$2a$%13'. strtr(base64_encode($salt), array('_' => '.', '~' => '/'));
$password_hash = crypt($password, $salt);
$name="Alex";
$surname="Newname";
$sex="M";
$date_of_birth="1985-11-29";
$date_of_registration="2019-01-03";
$email="test@wel.com";
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