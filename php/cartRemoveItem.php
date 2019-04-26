<?php
  session_start();
 ?>
 <?php
  $itemId = $_GET['songId'];
  if (($key = array_search($itemId, $_SESSION['cart'])) !== false) {
    unset($_SESSION['cart'][$key]);
  }
  header("Location: cart.php");
  ?>
