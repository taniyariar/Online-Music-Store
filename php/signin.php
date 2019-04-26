<?php
  session_start();
  session_regenerate_id(true);
 ?>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myapp";

$name = $_POST['email'];
$passwd = hash('sha256',$_POST['password']);
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `users` where `emailid`= '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
      $hpasswd = $row['password'];
      $level = $row['userlevel'];
  }
}
else{
  $error = "Error: " . $sql . "<br>" . $conn->error;
  echo $error;
}
if($hpasswd == $passwd){
  //session_regenerate_id();
  $_SESSION['user'] = $name;
  $_SESSION['level'] = $level;
  $_SESSION['cart'] = array();
  $_SESSION['playlist']= array();
  //session_write_close();
  if($level == 'u'){
    echo json_encode('{"status":"OK","level":"u"}');
  }
  else{
    echo json_encode('{"status":"OK","level":"a"}');
  }
}
else{
  echo json_encode('{"status":"NOT OK"}');
}
$conn -> close();
?>
