<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myapp";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$key = $_POST["id"];
$sql = "UPDATE inventory SET flag = 1 WHERE productid = '$key' ";
$result = $conn->query($sql);
echo json_encode('{"status":"OK"}');
$conn->close();
?>
