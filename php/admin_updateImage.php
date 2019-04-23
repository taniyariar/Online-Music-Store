<?php
  $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
    if (!(in_array($_FILES['image']['type'], $arr_file_types))) {
      $array= array("id" => "not match");
      echo json_encode ($array);
      return;
    }
  if (!file_exists('../img')) {
    mkdir('../img', 0777);
    }

  $temp = explode(".", $_FILES["image"]["name"]);
  $newfilename = $_POST['id'].".". $temp[1];
  $id = intval($_POST['id']);
  $data = addslashes(file_get_contents($_FILES['image']['tmp_name']));

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "myapp";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql1 = "UPDATE `images` set `image_name` = '$newfilename', `image`='$data' where `productid`='$id'";
  if($conn->query($sql1) == TRUE){
    move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $newfilename);
    $array= array("id" => $id);
    echo json_encode ($array);
  }
  else{
    $error =  "Error: " . $sql1 . "<br>" . $conn->error;
    $array= array("id" => $error);
    echo json_encode ($array);
  }
  $conn->close();

 ?>
