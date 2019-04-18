<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myapp";

$conn = new mysqli($servername, $username, $password, $dbname);


echo "Hello world!";
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$key = $_POST["productid"];

$sql = "UPDATE inventory SET flag = 1 WHERE productid = '$key' ";



//$sql = "DELETE FROM `inventory` where productid= '$key'";
//echo $sql;
$result = $conn->query($sql);

$conn->close();
?>