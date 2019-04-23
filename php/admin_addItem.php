<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myapp";

$title =$_POST['title'];
$artists = explode (",", $_POST['artists']);
$genre = $_POST['genre'];
$description = $_POST['description'];
$dur =floatval($_POST['dur']);
$year = intval($_POST['year']);
$price = floatval($_POST['price']);
$flag = 0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$num = 0;
$sql1 = "INSERT INTO `inventory` (`pname`,`genre`,`info`,`year_date`,`duration`,`price`,`flag`) VALUES('$title','$genre','$description','$year','$dur','$price','$flag')";
if($conn->query($sql1) == TRUE){
  $last_id = $conn->insert_id;
  foreach ($artists as &$value){
    $sql3 = "INSERT INTO `artists`(`productid`,`aname`) VALUES('$last_id','$value')";
    if($conn->query($sql3) == TRUE){
      $num += 1;
    }
  }
  if($num == count($artists)){
    echo json_encode ('{"id":'.$last_id.'}');
  }
}
else{
 $error = "Error: " . $sql . "<br>" . $conn->error;
 echo json_encode('{"status":"'.$error.'"}');
  }
$conn->close();
 ?>
