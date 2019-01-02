<?php 
class db { // start of class
   var $servername = "localhost";
   var $username ="root" ;
   var $password = "r2d2";
   var $dbname = "loginregister";
   
function init(){ //start of init function
     // Create connection
   $conn = new mysqli("localhost", "root", "r2d2","loginregister");

    // Check connection
    if ($conn->connect_error) { 
      die("Connection with DB failed: " . $conn->connect_error."</br>");
     }  else {
     //TODO investigate how to show in log instead of the page
    // echo "Connected successfully</br>";
     return $conn;
   }
   } //end of init function
   
function login($username, $password,$conn){
   $sql = "SELECT * FROM USERS WHERE username='".$username."' AND password='".$password."';";
   $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 echo "<h2>User ".$username." is logged!</h2>";
 echo "<h3>Details:</h3>";
 while($row = mysqli_fetch_assoc($result)) {
  echo "id: " . $row["user_id"]. "</br>username: " . $row["username"]. "</br>name: " . $row["name"]. "</br>surname: " . $row["surname"]. "</br>sex: ". $row["sex"]. "</br>date of birth: ". $row["date_of_birth"]."</br>date of registration: ". $row["date_of_registration"]."</br>email: ". $row["email"]."</br>picture: ". $row["picture"]."<br>";
  }
  }
  else {
    echo "<h2>user or password is incorrect.</h2> Try to <a href='../html/login.html'>login</a> again with correct data or <a href='../html/register.html'>register!</a></h2>";
}
echo "</br>";
}

function takeAllUsers($conn){
$sql = "SELECT * FROM USERS;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   echo "<h3>Details:</h3>";
 while($row = mysqli_fetch_assoc($result)) {
  echo "id: " . $row["user_id"]. "</br>username: " . $row["username"]. "</br>name: " . $row["name"]. "</br>surname: " . $row["surname"]. "</br>sex: ". $row["sex"]. "</br>date of birth: ". $row["date_of_birth"]."</br>date of registration: ". $row["date_of_registration"]."</br>email: ". $row["email"]."</br>picture: ". $row["picture"]."<br>";
    }
} else {
    echo "0 results";
}

}

function closeConnection($conn){
$result=mysqli_close($conn); 
if($result) {
//TODO investigate how to show in log instead of the page
// echo "Connection closed</br>";
} else {
echo "There is an issue with closing connection</br>";
}
}

} // end of class
?>
