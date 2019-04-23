 <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myapp";

$fname  =$_POST['fname'];
$lname  = $_POST['lname'];
$email  = $_POST['email'];
$phone = $_POST['phone'];
$code  = $_POST['code'];
$pass = $_POST['passwd'];
$userlevel = 'u';
$pass  = hash('sha256', $pass );


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `users` where emailid = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
  {
    echo json_encode('{"status":"exist"}');
  }

}
else {
 $sql = "insert into `users` (`fname`,`lname`,`emailid`,`phoneno`,`countrycode`,`password`,`userlevel`) values('$fname','$lname','$email','$phone','$code','$pass','$userlevel')";

 if($conn->query($sql) == TRUE){
  echo json_encode('{"status":"inserted"}');
 }
 else{
  echo "Error: " . $sql . "<br>" . $conn->error;
 }
}

$conn->close();
?>
