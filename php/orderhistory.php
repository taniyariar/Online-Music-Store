<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header("Location:../signin.html");
  }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Order History | The Music Store</title>
     <meta http-equiv ="content-type" context = "text/html">
     <meta name = "viewport" content = "width=device-width, initial-scale=1">
     <meta name = "author" content = "Fenny Mahajan, Noumika Balaji, Taniya Riar">
     <link rel = "icon" href = "img/logo.png" type = "image/png" sizes = "16x16">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <style media="screen">
     #order-table{
        border: 3px solid grey;
     }
     #history{
       padding: 20px;
     }
     #action-btns{
       text-align: center;
     }
     #empty{
       color: orange;
       font-size: 35px;
       font-weight: bold;
       text-align: center;
     }
   </style>
   <script type="text/javascript">
     function transfer(){
       window.location="../musichomepage.php";
     };
   </script>
   <body>
     <div class="history" id="history">
 			<h1>Order History</h1>
      <br>
 			<table id="order-table" class="table table-striped table-bordered" cellspacing="0">
 	            <tr id="header">
 	                <th>Date/Time of Order</th>
                  <th>Order Number</th>
 	                <th>Product Name</th>
 	                <th>Price (USD)</th>
 									<th>Album Cover</th>
 	            </tr>
              <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "myapp";
                $conn = new mysqli($servername, $username, $password, $dbname);
                 if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                 }
                $sid = $_SESSION['user'];
                $_SESSION['playlist'] =  array();
                $sql1 = "SELECT `userid` from `users` where `emailid`='$sid'";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                  while($row1 = $result1->fetch_assoc()){
                    $userid = $row1['userid'];
                  }
                }
                else{
                  $error = "Error: " . $sql . "<br>" . $conn->error;
                  echo $error;
                }
                $sql2 = "SELECT  `orderid`,`date_of_order` from `orders` where `userid`='$userid'";
                $orders =[];
                $do = [];
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                  while($row2 = $result2->fetch_assoc()){
                    array_push($orders,$row2['orderid']);
                    array_push($do,$row2['date_of_order']);
                  }
                }

                foreach ($orders as $key => $value){
                  $products = [];
                  $sql3 = "SELECT `productid` from `order_prod_map` where `orderid`='$orders[$key]'";
                  $result3 = $conn->query($sql3);
                  if ($result3->num_rows > 0) {
                    while($row3 = $result3->fetch_assoc()){
                        array_push($products,$row3['productid']);
                      }
                  }
                  foreach ($products as &$val) {
                    $sql4 = "SELECT `pname`,`price` from `inventory` where `productid`='$val'";
                    $result4 = $conn->query($sql4);
                    if ($result4->num_rows > 0) {
                      while($row4 = $result4->fetch_assoc()){
                        $date_of_order = $do[$key];
                        $orderno = $orders[$key];
                        $title = $row4['pname'];
                        $price = round($row4['price'],2);
                      }
                    }
                    $sql5  = "SELECT `image` from `images` where `productid` = '$val'";
                    $result5 = $conn->query($sql5);
                    if ($result5->num_rows > 0) {
                      while($row5 = $result5->fetch_assoc()){
                        $image = $row5['image'];
                      }
                    }
                    array_push($_SESSION['playlist'],$val);
                    $imageString ='<img src="data:image/jpeg;base64,'.base64_encode($image).'" width="100px" height="100px"/>';
                    echo "<tr><td>".$date_of_order."</td><td>".$orderno."</td><td>".$title."</td><td>$".$price."</td><td>".$imageString."</td></tr>";
                  }
                }
                if(sizeof($orders) == 0){
                  echo "<p id='empty'>Order History is Empty !!!</p> ";
                }
                $conn->close();
               ?>
 				</table>
        <div id="action-btns">
          <button id="back-btn" type="submit" class="btn btn-primary" onclick="transfer()">Back</button>
        </div>
 		</div>

   </body>
 </html>
