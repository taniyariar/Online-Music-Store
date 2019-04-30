<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "myapp";
  $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }

 $genreSearch = [];
 foreach ($_GET['favorite'] as &$value) {
   array_push($genreSearch,$value);
 }

 $items = "";
 $recordPerPage = 8;
 $page ='';
 if (isset($_GET['page'])){
   $page= $_GET['page'];
 }
 else{
   $page =1;
 }
$start_from = ($page - 1)*$recordPerPage;

if(sizeof($genreSearch) > 0 ){

}

 $sql1 = "SELECT * from `inventory` where `flag`=0 LIMIT $start_from,$recordPerPage";
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

     //$item = array("id" => $pid,"title" => $pname,"price" => round($price,2), "image" => $imagename, "info" => $info, "genre" => $genre, "artist" => $album_artists,"year" => $year,"dur" => $duration);
     //array_push($items,$item);
     //$string = "img/".$imagename;
     $string = 'data:image/jpeg;base64,'.base64_encode( $image );
     $tileinfo = '<li>'.$pname.'</li><li>'.$album_artists.'</li><li>$'.round($price,2).'</li>';
     $info = '<button id="info-btn" style="margin-left:70px;" class = "btn btn-info" onclick="detailsShow(\''.$genre.'\',\''.$info.'\','.$year.','.$duration.')">Description</button>';
     $details = '<ul id="details" style="list-style-type:none;padding:10px;color:white;text-align:center;">'.$tileinfo.'<li style="list-style-type:none;float:left;"><button class = "btn btn-info" onclick="addToCart('.$pid.')">Add to Cart</button>'.$info.'</li></ul>';
     $img = '<li style="list-style-type: none;float:left;padding:45px;margin-bottom:30px;"><img src='.$string.' style="width:300px;height:300px;border:3px solid grey;" >'.$details.'</li>';
     $items .= $img;
      }
    }
    else{
      $error = "Error: " . $sql . "<br>" . $conn->error;
      echo $error;
    }
    $page_query = "SELECT * FROM `inventory` where `flag`=0";
    $page_result = $conn->query($page_query);
    $total_records = $page_result->num_rows;
    $total_pages = ceil($total_records/$recordPerPage);
    $pagination = "";
    for ($i=1; $i <= $total_pages ; $i++) {
      $pagination .= '<a class="pagination_link" href="javascript:void(0)" id="'.$i.'">'.$i.'</a>';
    }

    $output = array("data" => $items, "total_pages" => $pagination);
    echo json_encode($output);
    $conn -> close();
 ?>
