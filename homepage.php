<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header("Location:signin.html");
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home | The Music Store</title>
        <meta charset = "UTF-8">
        <meta http-equiv="content-type" context = "text/html">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<link rel = "icon" href = "img/logo.png" type = "image/png" sizes = "16x16">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity = "sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin = "anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity = "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin = "anonymous"></script>
        <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity = "sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin = "anonymous">
        <link rel = "stylesheet" href = "css/homepage.css">

        <script type = "text/javascript" src = "js/homepage.js"></script>
    </head>
    <style media="screen">
    #shop-btn {
        height: 120px;
        width: 380px;
        border: solid white 1px;
        border-radius: 10px;
        color: white;
        background: linear-gradient(to left, white 50%, black 50%);
        background-size: 200% 100%;
        background-position: left bottom;
        transition: all .75s ease;
        margin-bottom: 20px;
        font-size: 60px;
    }
    #shop-btn:hover {
        background-position: right bottom;
    }
    </style>
    <body>
        <!-- Navigation Bar -->
        <nav class = "navbar navbar-expand-lg navbar-dark bg-transparent" id = "myNavbar">
            <a class = "navbar-brand" href = "#">
                <img src = "img/logo.png" width = "40" height = "40" alt = "The Music Store">
            </a>
            <div class = "collapse navbar-collapse" id = "navbarSupportedContent">
                <ul class = "navbar-nav mr-auto">
                    <li class = "nav-item active">
                        <a class = "nav-link" href="homepage.php" style = "font-size: 18px;">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <div class = "vl"></div>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "#content-container" style = "font-size: 18px; color:white;">Shop</a>
                    </li>
                </ul>
                <ul class = "nav navbar-nav navbar-right" style = "margin-top: 5px;">
                  <!--  <li>
                        <form class = "form-inline my-2 my-lg-0">
                            <input class = "form-control mr-sm-2" type = "search" placeholder = "Search" aria-label = "Search">
                        </form>
                    </li>
                    <li class = "nav-item-right"><a href="php/cart.php" style = "font-size: 18px; color: white;"><span class="fas fa-shopping-cart"></span> Cart</a></li>
                    <li class = "nav-item-right"><a href="php/orderhistory.php" style = "font-size: 18px; color: white;"><span class="fas fa-file-alt"></span> Order History</a></li>-->
                    <li class = "nav-item-right"><a href="php/logout.php" style = "font-size: 18px; color: white;"><span class="fas fa-arrow-circle-right"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- Store Name -->
        <div class = "jumbotron">
            <div class = "container text-center" style = "margin-bottom: -15px;">
                <i class="fas fa-phone-square"></i>
                <p  class = "contact" style = "font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px; color: white;">972-883-2222</p>
                <?php
                  if($_SESSION['level'] == 'a'){
                    echo "<p class = 'aboutUs' style = 'float: left; font-size: 18px; color: white; margin-left: -180px; margin-top: 38px;'><a href = 'adminpage.php' style = 'color: white;'>Admin Controls</a></p>";
                  }
                 ?>

                <h1 style = "font-family: Georgia, 'Times New Roman', Times, serif; font-size: 60px; color: white;">The Music Store</h1>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter-square"></i>
                <p class = "meetTheTeam" style = "float: right; font-size: 18px; color: white; margin-right: -181px; margin-top: -40px;"><a href = "meettheteam.php" style = "color: white;">#MeetTheTeam</a></p>
                <p style = "font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px; color: white;">Latest Albums  &bull;  Greatest Hits  &bull;  Billboard Chartbusters</p>

            </div>
        </div>

        <div class = "jumbotron-new">
            <div class = "container-carousel"  style = "margin-top: -32px; width: 80%; margin-left: auto; margin-right: auto;">
                <div id="carouselList" class="carousel slide" data-ride="carousel" style = "width: 100%; height: 460px; padding-top: 5px;">
                    <ol class = "carousel-indicators">
                        <li data-target = "#carouselList" data-slide-to = "0" class = "active"></li>
                        <li data-target = "#carouselList" data-slide-to = "1"></li>
                        <li data-target = "#carouselList" data-slide-to = "2"></li>
                        <li data-target = "#carouselList" data-slide-to = "3"></li>
                        <li data-target = "#carouselList" data-slide-to = "4"></li>
                    </ol>
                    <div class="carousel-inner" style = "width: 100%; height: 450px; align-content: center; margin: auto; border: 2px solid #333333; border-radius: 10px;">
                        <div class="carousel-item active">
                            <img  class = "d-block w-100" src="img/carousel1new.jpg" alt="The Greatest Hits - Queen">
                        </div>
                        <div class="carousel-item">
                            <img class = "d-block w-100" src="img/carousel2new.jpg" alt="The Greatest Hits - Pink Floyd">
                        </div>
                        <div class="carousel-item">
                            <img class = "d-block w-100" src="img/carousel3new.jpg" alt="The Greatest Hits - AC-DC">
                        </div>
                        <div class="carousel-item">
                            <img class = "d-block w-100" src="img/carousel4new.jpg" alt="The Greatest Hits - The Beatles">
                        </div>
                        <div class="carousel-item">
                            <img class = "d-block w-100" src="img/carousel5new.jpg" alt="The Greatest Hits - Led Zeppelin">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselList" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselList" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Carousel element to display the latest songs -->
        <!-- <div class = "container">

        </div> -->
        <div id = "content-container">
            <div style = "font-size: 30px; text-align: center;">
                <a href = "#main-content-container"><i class = "fas fa-angle-down fa-2x" style = "color: white;"></i></a>
            </div>
            <div id = "main-content-container" style = "margin-top: 80px;">
                <h1 style = "text-align: center; color: white; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 100px;">All your favorite music.</h1>
                <br/>
                <h1 style = "text-align: center; color: white; font-family: Georgia, 'Times New Roman', Times, serif;">In one place.</h1>
            </div>
            <br/>
            <div id = "shop-button" style="padding:20px;">
                <button id= "shop-btn" onclick="window.location='musichomepage.php'">
                    <div class = "shop-text">SHOP</div>
                </button>
            </div>
        </div>
        <footer class = "footer" style = "bottom:0;
        width: 100%;
        height: 2em;
        background: #333333;
        color: white;
        font-size: small;
        position:fixed;
        text-align: center;>
            <div class = "footer-container">
                <span class = "text-muted">Copyright &copy; 2019 - Fenny Mahajan, Noumika Balaji, Taniya Riar (CS6314.001 - Spring 2019)</span>
            </div>
        </footer>
    </body>
</html>
