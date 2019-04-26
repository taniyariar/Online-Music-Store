<?php
  session_start();
 ?>
 <?php

 $id = intval($_POST['id']);
 if(!isset($_SESSION['cart'])){
   if(!in_array($id,$_SESSION['playlist'])){
     $_SESSION['cart'] = array();
     array_push($_SESSION['cart'],$id);
     $counter = sizeof($_SESSION['cart']);
     $info = array("status" => "added" , "counter" => $counter);
     echo json_encode($info);
   }
   else{
     $counter = sizeof($_SESSION['cart']);
     $info = array("status" => "purchased" , "counter" => $counter);
     echo json_encode($info);
     }
 }
 else{
 if(in_array($id,$_SESSION['cart'])){
   $counter = sizeof($_SESSION['cart']);
   $info = array("status" => "exists" , "counter" => $counter);
   echo json_encode($info);
  }
 else{
   if(!in_array($id,$_SESSION['playlist'])){
     array_push($_SESSION['cart'],$id);
     $counter = sizeof($_SESSION['cart']);
     $info = array("status" => "added" , "counter" => $counter);
     echo json_encode($info);
   }
   else{
     $counter = sizeof($_SESSION['cart']);
     $info = array("status" => "purchased" , "counter" => $counter);
     echo json_encode($info);
     }
   }
 }
  ?>
