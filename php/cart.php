<?php
  session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Cart | The Music Store</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script type="text/javascript">
      function removeItem(id){
        window.location= "cartRemoveItem.php?songId="+id;
      }
      function placeOrder(p){
        window.location="placeOrder.php?p="+p;
      };
      function transfer(){
          window.location="../musichomepage.php";
      };
     </script>
     <style media="screen">
     #cart-list{
       clear:left;
       padding:20px;
     }
     #cart-table{
       border: 3px solid grey;
     }
     #total{
       font-weight: bold;
       font-size: 25px;
     }
     #action-btns{
       padding:20px;
       text-align: center;
     }
     .btn_btn-primary{
       display: inline-block;
     }
     #empty{
       color: orange;
       font-size: 35px;
       font-weight: bold;
       text-align: center;
     }
     </style>
   </head>
   <body>
     <div class="cart-list" id="cart-list">
 			<h1>Shopping Cart</h1>
      <br>
 			<table id="cart-table" class="table table-striped table-bordered" cellspacing="0">
 	            <tr id="header">
 	                <th>Product Name</th>
 									<th>Artists</th>
 									<th>Album Cover</th>
                  <th>Price (USD)</th>
 									<th>Remove</th>
 	            </tr>
              <?php
              if(sizeof($_SESSION['cart']) == 0){
                echo  "<p id='empty'>Cart is Empty !!!</p> ";
              }
               ?>
              <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "myapp";
                $conn = new mysqli($servername, $username, $password, $dbname);
                 if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                 }
                $cost = 0;
                if(isset($_SESSION['cart'])){
                  foreach ($_SESSION['cart'] as &$value) {
                    $sql = "SELECT * from `inventory` where `productid`='$value'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()){
                      $title = $row['pname'];
                      $price = round($row['price'],2);
                      $cost = $cost+$price;
                      $artists = [];
                      $sql1 = "SELECT * from `artists` where `productid`='$value'";
                      $result2 = $conn->query($sql1);
                      while($row2 = $result2->fetch_assoc()){
                        array_push($artists,$row2['aname']);
                      }
                      $album_artists = join(",",$artists);
                      $sql2 = "SELECT * from `images` where `productid`='$value'";
                      $result3 = $conn->query($sql2);
                      while($row3 = $result3->fetch_assoc()){
                        $albumcover = $row3['image'];
                      }
                      $imageString = '<img src="data:image/jpeg;base64,'.base64_encode($albumcover).'" width="70px" height="70px"/>';
                      $removeButttonString="<td><button  class='btn btn-default' id='remove' onclick='removeItem(".$value.")'>Remove</button></td>";
                      echo "<tr><td>".$title."</td><td>".$album_artists."</td><td>".$imageString."</td><td>$".$price."</td>".$removeButttonString."</tr>";
                    }
                  }
                  else{
                   $error = "Error: " . $sql . "<br>" . $conn->error;
                   echo $error;
                    }
                  }
                }
                /*else{
                  echo "<p id='empty'>Cart is Empty !!!</p> ";
                }*/
                $conn->close();
               ?>
        <tr id=total>
          <td>Total</td>
          <td></td>
          <td>=</td>
          <td>$<?php echo $cost ?></td>
          <td></td>
        </tr>
 				</table>
        <!--<h3 id="total">Total = $<?php echo $cost?></h3>-->
        <div id="action-btns">
          <button id="place-order" type="submit" class="btn btn-success btn-lg" <?php if (sizeof($_SESSION['cart']) == '0'){ ?> disabled <?php   } ?> onclick='placeOrder(<?php echo $cost ?>)'>Place Your Order</button>
      </div>
      <div id="action-btns">
        <button id="continue-shop" type="submit" class="btn btn-primary" onclick="transfer()">Continue Shopping</button>
      </div>

 		</div>
   </body>
 </html>
