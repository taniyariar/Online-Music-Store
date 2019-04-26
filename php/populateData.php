<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "myapp";
  $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }

 $sql1 = "SELECT * from `inventory` where `flag`=0";
 $result1 = $conn->query($sql1);
 if ($result1 ->num_rows > 0) {
   while($row1 = $result1 ->fetch_assoc()){

   }
}
 $sql2 = "SELCT `image` from `inventory` where `productid`= '$id'";

 ?>
