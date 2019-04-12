<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myapp";

echo "Hello world!";
$name = $_POST['username'];
 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
echo "Connected successfully";
}

$sql = "SELECT * FROM `users` where emailid = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) 
  {
    header("Location: homepage.php");
  }
  
} 





?>