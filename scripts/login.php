<?php
include("class_lib.php"); 
ini_set('display_errors',1);
error_reporting(E_ALL);
 $username=check_data($_POST["login"]);
 $password=check_data($_POST["password"]);
 $db=new db();
 $conn=$db->init();
 $db->login($username,$password,$conn);
 echo "</br><a href='../html/login.html'>Back to Login page</a>";
 $db->closeConnection($conn);
function check_data($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>