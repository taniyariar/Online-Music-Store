<?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "myapp";
        $conn = new mysqli($servername, $username, $password, $dbname);
         if ($conn->connect_error) {
         	die("Connection failed: " . $conn->connect_error);
         }

         $sql = "SELECT * FROM inventory";
         //$sql = "SELECT i.`productid`,i.`pname`,i.`genre`,i.`info`,i.`year_date`,i.`duration`,i.`price`,i.`date_of_entry`,a.`aname` FROM  `inventory` i JOIN `artists` a ON i.`productid` = a.`productid`";
         $result = $conn->query($sql);
         //$finalRows = array();
         if ($result->num_rows > 0) {
         	// output data of each row
         	while($row = $result->fetch_assoc()) {
  				$pid = $row["productid"];
          $pname = $row['pname'];
          $genre = $row['genre'];
          $info = $row['info'];
          $year = $row['year_date'];
          $duration= $row["duration"];
          $price = $row["price"];
          $doe = $row['date_of_entry'];
          $artists = [];
          $flag = $row['flag'];
          $sql1 = "SELECT * from `artists` where `productid`='$pid'";
          $result2 = $conn->query($sql1);
        	while($row2 = $result2->fetch_assoc()){
            array_push($artists,$row2['aname']);
          }
          $album_artists = join(",",$artists);
          $sql2 = "SELECT * from `images` where `productid`='$pid'";
          $result3 = $conn->query($sql2);
          while($row3 = $result3->fetch_assoc()){
            $image = $row3['image'];
          }
          if($flag == 0){
            $instock = "Yes";
          }
          else{
            $instock="No";
          }
          $imageString = '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'" width="70px" height="70px"/>';
          $editButttonString="<td><button  class='btn btn-default' id='edit' onclick='editSong(".$pid.")'>Edit</button></td>";
          echo "<tr><td>".$pid."</td><td>".$pname."</td><td>".$album_artists."</td><td>".$genre."</td><td>".$info."</td><td>".$year."</td><td>".$duration."</td><td>".$price."</td><td>".$doe."</td><td>".$instock ."</td><td>".$imageString."</td>".$editButttonString."</tr>";
         	}
         }
         else {
         	echo "0";
         }

         $conn->close();
  ?>
