<?php
	session_start();
	if(!isset($_SESSION["user"])){
		header("Location:signin.html");
	}
	else{
		if($_SESSION["level"]!="a"){
			header("Location:signin.html");
		}
	}
 ?>
<html lang = "en" dir = "ltr">
	<head>
		<title>Admin Page | bass</title>
		<meta charset = "UTF-8">
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
				<script type = "text/javascript" src ="js/admin_addItem.js"></script>
				<script type = "text/javascript" src ="js/admin_editItem.js"></script>
				<script type = "text/javascript" src ="js/admin_deleteItem.js"></script>
				<script type="text/javascript">
					function editSong(id){
					}
					function deleteSong(id){
					}
				</script>
				<style media="screen">
				#navMain{
					position: fixed;
					top: 0;
					width: 100%;
				}
				#welimage{
					padding:20px;
					float:left;
				}
				#home{
					margin-top: 50px;
					color: orange;
				}
				#add-item{
					clear:left;
					padding:20px;
				}
				#edit-item{
					clear:left;
					padding:20px;
				}
				#delete-item{
					clear:left;
					padding:20px;
				}
				.row{
					margin-top:10px;
				}
				.error {
				    color: red;
				    font:bold;
				    font-size: 14px;
				}
				</style>

	</head>
	<body id="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navMain">
		  <a class="navbar-brand" href="#"><img src="img/logo.png" width="25px" height="25px"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#add-item">Add Item</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#edit-item">Edit Item</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#delete-item">Delete Item</a>
		      </li>
					<li class="nav-item">
		        <a class="nav-link" href="homepage.php">bass Online Store</a>
		      </li>
		      <li class="nav-item" id="logout">
		        <a class="nav-link" href="php/logout.php">Logout <i class="fa fa-sign-out"></i></a>
		      </li>
		    </ul>
		  </div>
		</nav>
		<div id="home">
			<p>
			<img id="welimage" src="img/logo.png">
			<h1>Welcome to admin page !!! <h1>
			</p>
		</div>
		<div class="add-item" id="add-item">
		<h1>Add an Item</h1>
		<p id="validate"></p>
		<form id="additemform" method="post" enctype="multipart/form-data">
      <div class="row">
       <div class="col">
         <input type="text" class="form-control" placeholder="Title" id="title">
       </div>
       <div class="col">
         <input type="text" class="form-control" placeholder="Artists" id="artists">
       </div>
     </div>
		 <div class="row">
			 <div class="col">
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
			</div>
			<div class="row">
 			 <div class="col">
 				  <input type="text" class="form-control" placeholder="Description" id="description">
 			 </div>
 			</div>
			<div class="row">
				<div class="col">
					<input type="text" class="form-control" placeholder="Duration" id="dur">
				</div>
				<div class="col">
					<input type="text" class="form-control" placeholder="Year of Release" id="year">
				</div>
				<div class="col">
					<input type="text" class="form-control" placeholder="Price(USD)" id="price">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<input type="file" class="form-control" name="image" id="image"></input>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<button type="submit" class="btn btn-primary">Add Item</button>
				</div>
			</div>
    </form>
		</div>
		<div class="edit-item" id="edit-item">
			<h1>Edit an Item</h1>
			<table id="edit-table" class="table table-striped table-bordered" cellspacing="0">
	            <tr id="header">
	                <th>Product Id</th>
	                <th>Product Name</th>
									<th>Artists</th>
	                <th>Genre</th>
	                <th>Description</th>
	                <th>Year of Release</th>
	                <th>Duration</th>
	                <th>Price (USD)</th>
	                <th>Record Date</th>
									<th>In Stock</th>
									<th>Album Cover</th>
									<th>Edit</th>
	            </tr>
				</table>
		</div>
		<div class="delete-item" id="delete-item">
			<h1>Delete an Item</h1>
			<table id="delete-table" class="table table-striped table-bordered" cellspacing="0">
							<tr id="header">
									<th>Product Id</th>
									<th>Product Name</th>
									<th>Artists</th>
									<th>Genre</th>
									<th>Description</th>
									<th>Year of Release</th>
									<th>Duration</th>
									<th>Price (USD)</th>
									<th>Record Date</th>
									<th>Album Cover</th>
									<th>Delete</th>
							</tr>
				</table>
		</div>
	</body>
</html>
