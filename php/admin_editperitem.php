<?php
  $key = $_GET["songId"];
  $title ="";
  $artists="";
  $genre ="";
  $descrip ="";
  $dur="";
  $year="";
  $price="";
  $imagename="";

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "myapp";
  $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }

   $sql = "Select * from inventory where productid='$key'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
       $title = $row['pname'];
       $genre = $row['genre'];
       $descrip = $row['info'];
       $year = $row['year_date'];
       $dur= $row["duration"];
       $price = $row["price"];
       $flag = $row["flag"];
       $arts = [];
       $sql1 = "SELECT * from `artists` where `productid`='$key'";
       $result2 = $conn->query($sql1);
       while($row2 = $result2->fetch_assoc()){
         array_push($arts,$row2['aname']);
       }
       $artists = join(",",$arts);
       $sql2 = "SELECT * from `images` where `productid`='$key'";
       $result3 = $conn->query($sql2);
       while($row3 = $result3->fetch_assoc()){
         $image = $row3['image'];
         $imagename = $row3['image_name'];
       }
       $imageString = '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'" width="70px" height="70px"/>';
   }
 }
 $conn->close();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Edit Form | bass</title>
		<meta charset = "UTF-8">
        <meta http-equiv ="content-type" context = "text/html">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <meta name = "author" content = "Fenny Mahajan, Noumika Balaji, Taniya Riar">
        <link rel = "icon" href = "../img/logo.png" type = "image/png" sizes = "16x16">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
				<link rel="stylesheet" href="../css/adminpage.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style media="screen">
          #edit-item-form{
            padding:20px;
          }
          .row{
            padding:10px;
          }
        </style>
        <script type="text/javascript">
        $("#done-btn").submit(function(){
          window.location.href="http://localhost:81/WPL/adminpage.php";
        });
        $(document).ready(function(){
          $("#genreSelect").val('<?php echo $genre ?>');
          $("#instockSelect").val('<?php echo $flag ?>');
          $("#image").change(function(){
            $("#imagetile").empty();
          });
          $.getScript('../js/admin_editperitem.js',function(){
            $("#edit-item-form").submit(function(e){
              e.preventDefault();
              var key=<?php echo $key?>;
              var name = '<?php echo $imagename?>';
              validationfunc(key,name);
            });
          });
        });
        </script>
  </head>
  <body>
    <div class="edit-item-form" id="edit-item-form">
		<h1>Edit Form per Item</h1>
		<p id="validate"></p>
		<form id="edititemform" method="post" enctype="multipart/form-data">
      <div class="row">
       <div class="col">
         <label for="title">Title</label>
         <input type="text" class="form-control" value='<?php echo $title ?>' placeholder="Title" id="title">
       </div>
       <div class="col">
         <label for="artists">Artists</label>
         <input type="text" class="form-control" value='<?php echo $artists ?>' placeholder="Artists" id="artists">
       </div>
     </div>
		 <div class="row">
			 <div class="col">
         <label for="genreSelect">Genre</label>
				 <select class="form-control" id="genreSelect">
	  		 	<option value="" disabled selected>Select Genre</option>
					<option value="Rock">Rock</option>
					<option value="Pop">Pop</option>
					<option value="Classic">Classic</option>
					<option value="Indie">Indie</option>
          <option value="Dance">Dance</option>
          <option value="Electronic">Electronic</option>
				</select>
			 </div>
       <div class="col">
         <label for="instockSelect">In Stock</label>
				 <select class="form-control" id="instockSelect">
	  		 	<option value="" disabled selected>In Stock</option>
					<option value=0>Yes</option>
					<option value=1>No</option>
				</select>
			 </div>
			</div>
			<div class="row">
 			 <div class="col">
         <label for="description">Description</label>
 				  <input type="text" class="form-control" value='<?php echo $descrip ?>' placeholder="Description" id="description">
 			 </div>
 			</div>
			<div class="row">
				<div class="col">
          <label for="dur">Duration</label>
					<input type="text" class="form-control"  value='<?php echo $dur ?>' placeholder="Duration" id="dur">
				</div>
				<div class="col">
          <label for="year">Year of Release</label>
					<input type="text" class="form-control" value='<?php echo $year ?>' placeholder="Year of Release" id="year">
				</div>
				<div class="col">
          <label for="price">Price (USD)</label>
					<input type="text" class="form-control" value='<?php echo $price ?>' placeholder="Price (USD)" id="price">
				</div>
			</div>
			<div class="row">
				<div class="col">
          <label for="image">Album Image File</label>
					<input type="file" class="form-control" name="image" id="image"></input>
				</div>
        <div class="col" id="imagetile">
          <label for="imagetile">Album Image</label><br/>
          <?php echo $imageString  ?>
        </div>
			</div>
			<div class="row">
				<div class="col">
					<button type="submit" class="btn btn-primary" id="edit-item-btn" >Edit Item</button>
				</div>
        <div class="col">
					<button type="submit" class="btn btn-primary" id="done-btn" >Cancel</button>
				</div>
			</div>
    </form>
  </div>
  </body>
</html>
