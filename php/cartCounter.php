<?php
  session_start();
 ?>
 <?php
  if(isset($_SESSION['cart'])){
    $counter = sizeof($_SESSION['cart']);
  }
  $info = array("counter" => $counter);
  echo json_encode($info);
  ?>
