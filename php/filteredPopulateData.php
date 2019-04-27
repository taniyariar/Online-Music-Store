<?php
  $info = $_POST['info'];
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "myapp";
  $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }

  $genreSearch = [];
  foreach ($info as &$value) {
    array_push($genreSearch,$value);
  }

 $filteritems = [];

 $sql1 = "SELECT * from `inventory` where `flag`=0;";
 $result1 = $conn->query($sql1);
 if ($result1 ->num_rows > 0) {
   while($row = $result1 ->fetch_assoc()){
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
     $sql2 = "SELECT * from `artists` where `productid`='$pid'";
     $result2 = $conn->query($sql2);
     while($row2 = $result2->fetch_assoc()){
       array_push($artists,$row2['aname']);
     }
     $album_artists = join(",",$artists);
     $sql3 = "SELECT * from `images` where `productid`='$pid'";
     $result3 = $conn->query($sql3);
     while($row3 = $result3->fetch_assoc()){
       $image = $row3['image'];
       $imagename = strval($row3['image_name']);
        }
      $item = array("id" => $pid,"title" => $pname,"price" => round($price,2), "image" => $imagename, "info" => $info, "genre" => $genre, "artist" => $album_artists,"year" => $year,"dur" => $duration);
      array_push($filteritems,$item);
      }
    }
    else{
      $error = "Error: " . $sql . "<br>" . $conn->error;
      echo $error;
    }


    if(sizeof($genreSearch) > 0){
      $items= [];
      foreach ($filteritems as $value) {
        foreach ($genreSearch as  $val) {
          $pos1 = stripos(trim($value['title']),$val);
          $pos2 = stripos(trim($value['genre']),$val);
          if($pos1 !== false or $pos2 !== false){
            array_push($items,$value);
          }
        }
      }
      echo json_encode($items);
    }
    else{
      echo json_encode($filteritems);
    }

    $conn -> close();

 ?>
