<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myapp";

//echo "Hello world!";
$name = $_POST['username'];
$passwd = $_POST['password']; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `users` where emailid = '$name' and password= '$passwd'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) 
  {
	 echo json_encode('{"status":"OK"}');
	 //header('Location:http://localhost/WPL/homepage.html');
	 //echo $row;
  }
  
  
}





?>