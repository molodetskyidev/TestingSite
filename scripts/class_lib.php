<?php 
class db { //start of class
   var $servername = "localhost";
   var $username ="root" ;
   var $password = "r2d2";
   
   function init(){ //start of init function
     // Create connection
   $conn = new mysqli("localhost", "root", "r2d2");

    // Check connection
    if ($conn->connect_error) { 
      die("Connection failed: " . $conn->connect_error);
     }  else {
     echo "Connected successfully";
     return $conn;
   }
   } //end of init function
   
   function login($username, $password){
   $sql = "SELECT * FROM USERS WHERE username=".$username." AND password=".$password;
if ($conn->query($sql) === TRUE) {
    echo "query was successful";
} else {
    echo "error while doing the query: " . $conn->error;
}
}
function closedb($test);
   {
   echo "Connection closed"
   }
  
   } //end of class
?>