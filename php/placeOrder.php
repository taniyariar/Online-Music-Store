<?php
  session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Order Placed | The Music Store</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <style media="screen">
     .fa_fa-check{
       color: green;
       font-size: 45px;
       text-align: center;
     }
     #thank-you{
       padding-top: 100px;
       text-align: center;
       font-size: 35px;
     }
     a{
       text-align: center;
       font-size: 30px;
     }
   </style>
   <body>
     <div class="thank-you" id="thank-you">
       <img src="../img/check_mark.png" alt="Thank You" width= "200px" height="200px">
       <?php
       $servername = "localhost";
       $username = "root";
       $password = "root";
       $dbname = "myapp";
       $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_SESSION['user']) && isset($_SESSION['cart'])){
          $price = $_GET['p'];
          $user = $_SESSION['user'];
          //echo $price,$user,$_SESSION['cart'];
          $sql1 = "SELECT `userid` from `users` where `emailid`='$user'";
          $result1 = $conn->query($sql1);
          if ($result1 ->num_rows > 0) {
            while($row = $result1 ->fetch_assoc()){
              $userid= $row['userid'];
              }
          }
          else{
            $error = "Error: " . $sql . "<br>" . $conn->error;
            echo $error;
          }
          $sql2 = "INSERT INTO `orders` (`total_cost`,`userid`) VALUES('$price','$userid')";
          if($conn->query($sql2) == TRUE){
            $orderid = $conn->insert_id;
          }
          else{
            $error = "Error: " . $sql . "<br>" . $conn->error;
            echo $error;
          }
          $count = 0;
          foreach ($_SESSION['cart'] as &$value) {
            $sql3 = "INSERT INTO `order_prod_map` (`orderid`,`productid`) VALUES('$orderid','$value')";
            if($conn->query($sql3) == TRUE){
              $count = $count +1 ;
            }
            else{
              $error = "Error: " . $sql . "<br>" . $conn->error;
              echo $error;
            }
          }
          if(sizeof($_SESSION['cart']) == $count){
            echo "<p>Order placed (Order# ".$orderid.")</p>";
            unset($_SESSION['cart']);
          }
        }
        else{
          header("Location:cart.php");
        }
        $conn -> close();
        ?>
        <a href="../musichomepage.php">Click here to Continue Shopping ..... </a>
     </div>
   </body>
 </html>
