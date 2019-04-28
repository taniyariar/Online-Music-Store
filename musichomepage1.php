<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header("Location:signin.html");
  }
  $_SESSION['cart'] = array(101,95,99);
  /*else{
    $_SESSION['user'] = $name;
    echo $_SESSION['user'];
    $_SESSION['cart'] = array(101,95,99);
    echo "Session variables are set as ".$_SESSION['cart'];
  }*/
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shop | The Music Store</title>
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
    <body>
        <!-- Navigation Bar -->
        <nav class = "navbar navbar-expand-lg navbar-dark bg-transparent" id = "myNavbar">
            <a class = "navbar-brand" href = "#">
                <img src = "img/logo.png" width = "40" height = "40" alt = "The Music Store">
            </a>
            <div class = "collapse navbar-collapse" id = "navbarSupportedContent">
                <ul class = "navbar-nav mr-auto">
                    <li class = "nav-item active">
                        <a class = "nav-link" href="homepage.html" style = "font-size: 18px;">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <div class = "vl"></div>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link" href = "#content-container" style = "font-size: 18px; color:white;">Shop</a>
                    </li>
                </ul>
                <input type = "text" name = "counter" id = "counter" value = "0" style = "font-size: 15px; margin-top: -30px; margin-right: -248px; color: white; width: 20px; background: black; text-decoration: none; border: none;" />
                <ul class = "nav navbar-nav navbar-right" style = "margin-top: 5px;">
                    <li>
                        <form class = "form-inline my-2 my-lg-0">
                            <input class = "form-control mr-sm-2" type = "search" placeholder = "Search" aria-label = "Search">
                        </form>
                    </li>
                    <li class = "nav-item-right"><a href="php/cart.php" style = "font-size: 18px; color: white;"><span class="fas fa-shopping-cart"></span> Cart</a></li>
                    <li class = "nav-item-right"><a href="php/orderhistory.php" style = "font-size: 18px; color: white;"><span class="fas fa-file-alt"></span> Order History</a></li>
                    <li class = "nav-item-right"><a href="php/logout.php" style = "font-size: 18px; color: white;"><span class="fas fa-arrow-circle-right"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- Store Name -->
        <div class = "jumbotron">
            <div class = "container text-center" style = "margin-bottom: -15px;">
                <i class="fas fa-phone-square"></i>
                <p  class = "contact" style = "font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px; color: white;">972-883-2222</p>
                <p class = "aboutUs" style = "float: left; font-size: 18px; color: white; margin-left: -180px; margin-top: 38px;"><a href = "aboutus.html" style = "color: white;">#AboutUs</a></p>
                <h1 style = "font-family: Georgia, 'Times New Roman', Times, serif; font-size: 60px; color: white;">The Music Store</h1>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter-square"></i>
                <p class = "meetTheTeam" style = "float: right; font-size: 18px; color: white; margin-right: -181px; margin-top: -40px;"><a href = "meettheteam.html" style = "color: white;">#MeetTheTeam</a></p>
                <p style = "font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px; color: white;">Latest Albums  &bull;  Greatest Hits  &bull;  Billboard Chartbusters</p>
            </div>
        </div>

        <!-- Filter -->
        <div id = "filterSection">
            <ul class = "filter" style = "text-align: center; align-content: center; font-size: 25px; line-height: 20px; color: white; display: inline;">
                <li>Filter by Genre:</li>
                <li>
                    <input type = "checkbox" checked = "true" value = "Rock">
                    <label>Rock</label>
                </li>
                <li>
                    <input type = "checkbox" checked = "true" value = "Pop">
                    <label>Pop</label>
                </li>
                <li>
                    <input type = "checkbox" checked = "true" value = "Jazz">
                    <label>Jazz</label>
                </li>
                <li>
                    <input type = "checkbox" checked = "true" value = "Classical">
                    <label>Classical</label>
                </li>
                <li>
                    <input type = "checkbox" checked = "true" value = "Metal">
                    <label>Metal</label>
                </li>
            </ul>
        </div>
        <!-- <input type = "Button" id= "add" value = "Add to Cart" style = "width: 110px; height: 50px; color: black; border: 1px solid black; border-radius: 10px;" /> -->
        <div id = "albumContainer">
                <ul id = "albums" style = "text-align: center; align-content: center; line-height: 80px; display: inline;">
                        <li data-type="Rock">
                            <div class = "flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="img/logo.png" alt="Avatar" style="width: 200px;height: 200px;">
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>John Doe</h1>
                                        <p>Architect & Engineer</p>
                                        <p>We love that guy</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li data-type = "Pop">
                            <div class = "flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="img/nb.jpg" alt="Avatar" style="width: 200px;height: 200px;">
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>John Doe</h1>
                                        <p>Architect & Engineer</p>
                                        <p>We love that guy</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li data-type = "Rock">
                            <div class = "flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="img/logo.png" alt="Avatar" style="width: 200px;height: 200px;">
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>John Doe</h1>
                                        <p>Architect & Engineer</p>
                                        <p>We love that guy</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li data-type = "Pop">
                            <div class = "flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="img/nb.jpg" alt="Avatar" style="width: 200px;height: 200px;">
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>John Doe</h1>
                                        <p>Architect & Engineer</p>
                                        <p>We love that guy</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
            <br/>
            <ul id = "albums" style = "text-align: center; align-content: center; line-height: 80px; display: inline;">
                    <li data-type = "Pop">
                        <div class = "flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="img/nb.jpg" alt="Avatar" style="width: 200px;height: 200px;">
                                </div>
                                <div class="flip-card-back">
                                    <h1>John Doe</h1>
                                    <p>Architect & Engineer</p>
                                    <p>We love that guy</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li data-type = "Metal">
                        <div class = "flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="img/tr.jpg" alt="Avatar" style="width: 200px;height: 200px;">
                                </div>
                                <div class="flip-card-back">
                                    <h1>John Doe</h1>
                                    <p>Architect & Engineer</p>
                                    <p>We love that guy</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li data-type = "Classical">
                        <div class = "flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="img/fm.jpg" alt="Avatar" style="width: 200px;height: 200px;">
                                </div>
                                <div class="flip-card-back">
                                    <h1>John Doe</h1>
                                    <p>Architect & Engineer</p>
                                    <p>We love that guy</p>
                                </div>
                            </div>
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
        <div class = "content-container">
            <div style = "font-size: 20px; text-align: center;">
                <a href = "#main-content-container"><i class = "fas fa-angle-down fa-2x" style = "color: white; opacity: 0.5;"></i></a>
            </div>
            <div id = "main-content-container" class = "main-content" style = "transition: all 0.75s ease;">
                <div class = "row">
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
                        </div>
                    </li>
                </ul>
        </div>
        <!-- Footer -->
        <footer class = "footer">
            <div class = "footer-container">
                <span class = "text-muted">Copyright &copy; 2019 - Fenny Mahajan, Noumika Balaji, Taniya Riar (CS6314.001 - Spring 2019)</span>
            </div>
        </footer>
    </body>
</html>
