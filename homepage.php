// HOMEPAGE
<?php
session_start();
if(!isset($_SESSION["username"])){
	header('Location: /MusicMaster/login.html');	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Music Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/main.js"></script>
  <script src="js/filter.js"></script>
  <script src="js/search.js"></script>
</head>
<body>
<style>
.dropbtn {
  background-color: #000000;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
  float:right;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #000000;}
</style>

<div class="jumbotron">
  <div class="container text-center">
    <h1>THE JUKEBOX</h1>
    <p>Explore the music </p>
  </div>
</div>
<body background="img/the-music-store-banner.jpg" >
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#myCarousel">Logo</a>
    </div>
	  
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#songsList">Home</a></li>
        <li><a href="#news">What's New</a></li>
        <li><a href="#contact">Deals</a></li>
        <div class="dropdown" >
     <button class="dropbtn">Support</button>
  <div class="dropdown-content">
    <a href="#">Contact Us</a>
	<a href="#">Return Policy</a>
	<a href="#">All Help Topics</a>
    </div>
  </div>
      </ul>
      
      
      <ul class="nav navbar-nav navbar-right">
      	<li>
      	<form class="navbar-form navbar-left" role="search">
  		<div class="form-group">
    	<input type="text" class="form-control" placeholder="Search" id="searchID">
 		 </div>
  		
		</form>
		<button type="submit" class="btn btn-default" style="margin-top:8px;" id="submitID">Submit</button>
		</li>
        
        <li><a href="php/Cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li><a href="php/order_History.php"><span class="glyphicon glyphicon-log-out"></span> Your History</a></li>
        <li><a href="php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-lg-2">
      <nav class="navbar navbar-default navbar-fixed-side">
       
    	
            <h3 class="text-center">Refine By Genre:</h3>
            <div class="well" style="max-height: 300px;overflow: auto;">
        		<ul class="list-group checked-list-box" id="check-list-box">
                  <li class="list-group-item" id="get-checked-data">rock</li>
                  <li class="list-group-item" id="get-checked-data">pop</li>
                  <li class="list-group-item" id="get-checked-data" >classic</li>
                  <li class="list-group-item" id="get-checked-data">alternative</li>
                  <li class="list-group-item" id="get-checked-data">metal</li>
                </ul>
            </div>
    	
    	
      </nav>
    </div>
    <div class="col-sm-9 col-lg-10">
      <!-- your page content -->
   

<div class="container">

	<div class="row">
	<div class="container">
  <br>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <h2 style="color: white">New & Hot Releases </h2>
	  
      <div class="item active">
	  
        <img src="img/11.jpg" alt="11" width="850" height="800">
     
      </div>

      <div class="item">
        <img src="img/17.jpg" alt="2" width="850" height="800">
        
      </div>
    
      <div class="item">
        <img src="img/10.jpg" alt="3" width="850" height="800">
       
      </div>

      <div class="item">
        <img src="img/9.jpg" alt="4" width="850" height="800">
       
      </div>
  	 <div class="item">
        <img src="img/7.jpg" alt="1" width="850" height="800">
       
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
	
</div>
	

</div><br>

	

<div class="container" id="songsList">
<br>
    <nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#row0">1</a></li>
    <li><a href="#row1">2</a></li>
    <li><a href="#row2">3</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
  </nav>
</div><br><br>

</div>
</div>
</div>

<footer class="container-fluid text-center">
  <p id="copyright">Online Store Copyright</p>

</footer>

</body>
</html>
