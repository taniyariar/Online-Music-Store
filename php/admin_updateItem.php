<?php
$id = intval($_POST['id']);
//echo $id;
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
$flag = intval($_POST['flag']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$num = 0;
$sql1 = "UPDATE `inventory` set `pname`= '$title',`genre`='$genre',`info`='$description',`year_date`= '$year',`duration`='$dur',`price`='$price',`flag`='$flag' where `productid`='$id'";
if($conn->query($sql1) == TRUE){
  $sql4= "DELETE from `artists` where `productid`='$id'";
  if($conn->query($sql4) == TRUE){
    foreach ($artists as &$value){
      $sql3 = "INSERT INTO `artists`(`productid`,`aname`) VALUES('$id','$value')";
      if($conn->query($sql3) == TRUE){
        $num += 1;
      }
    }
  }
  if($num == count($artists)){
    echo json_encode ('{"id":'.$id.'}');
  }
}
else{
 $error = "Error: " . $sql . "<br>" . $conn->error;
 echo json_encode('{"status":"'.$error.'"}');
  }
$conn->close();
 ?>
