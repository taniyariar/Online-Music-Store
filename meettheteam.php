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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel = "stylesheet" href = "css/meettheteam.css">
        <!-- <style>
            body {
                overflow: hidden;
            }
        </style> -->
    </head>
    <body>
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
                        <a class = "nav-link" href = "musichomepage.php" style = "font-size: 18px; color:white;">Shop</a>
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
                <!--<p class = "aboutUs" style = "float: left; font-size: 18px; color: white; margin-left: -180px; margin-top: 40px;"><a href = "aboutus.html" style = "color: white;">#AboutUs</a></p>-->
                <h1 style = "font-family: Georgia, 'Times New Roman', Times, serif; font-size: 60px; color: white;">The Music Store</h1>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter-square"></i>
                <p class = "meetTheTeam" style = "float: right; font-size: 18px; color: white; margin-right: -181px; margin-top: -40px;"><a href = "meettheteam.html" style = "color: white;">#MeetTheTeam</a></p>
                <p style = "font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px; color: white;">Latest Albums  &bull;  Greatest Hits  &bull;  Billboard Chartbusters</p>
            </div>
        </div>
        <!-- Heading -->
        <p style = "text-align: center; color: white; margin-top: -25px; font-size: 20px;">Meet the Team <i class="fas fa-arrow-circle-down"></i></p>
        <!-- Cards -->
        <div class = "row">
            <div class="card">
                <img src="img/fm.jpg" alt="Fenny Mahajan" style="height: 350px; width: 290px;">
                <h3 style = "text-align: center;">Fenny Mahajan</h3>
                <p style = "color: #333333; font-size: 15px; margin-top: -10px; text-align: center;">CS Graduate Student</p>
                <p style = "color: #333333; font-size: 15px; margin-top: -20px; text-align: center;">The University of Texas at Dallas</p>
                <a href="http://www.linkedin.com/in/fennymahajan116" target = "_blank" style = "color: black; font-size: 25px; margin-top: -20px; margin-left: 110px; margin-right: auto;"><i class="fa fa-linkedin-square"></i></a>
                <a href="mailto:fxm170007@utdallas.edu" target = "_blank" style = "color: black; font-size: 25px; margin-top: -37px; margin-right: 110px; margin-left: auto;"><i class="fa fa-envelope"></i></a>
            </div>
            <div class="card">
                <img src="img/nb.jpg" alt="Noumika Balaji" style="height: 350px; width: 290px;">
                <h3 style = "text-align: center;">Noumika Balaji</h3>
                <p style = "color: #333333; font-size: 15px; margin-top: -10px; text-align: center;">CS Graduate Student</p>
                <p style = "color: #333333; font-size: 15px; margin-top: -20px; text-align: center;">The University of Texas at Dallas</p>
                <a href="http://www.linkedin.com/in/noumikabalaji" target = "_blank" style = "color: black; font-size: 25px; margin-top: -20px; margin-left: 110px; margin-right: auto;"><i class="fa fa-linkedin-square"></i></a>
                <a href="mailto:noumika.balaji@utdallas.edu" target = "_blank" style = "color: black; font-size: 25px; margin-top: -37px; margin-right: 110px; margin-left: auto;"><i class="fa fa-envelope"></i></a>
            </div>
            <div class="card">
                <img src="img/tr.jpg" alt="Taniya Riar" style="height: 350px; width: 290px;">
                <h3 style = "text-align: center;">Taniya Riar</h3>
                <p style = "color: #333333; font-size: 15px; margin-top: -10px; text-align: center;">CS Graduate Student</p>
                <p style = "color: #333333; font-size: 15px; margin-top: -20px; text-align: center;">The University of Texas at Dallas</p>
                <a href="http://www.linkedin.com/in/taniyariar" target = "_blank" style = "color: black; font-size: 25px; margin-top: -20px; margin-left: 110px; margin-right: auto;"><i class="fa fa-linkedin-square"></i></a>
                <a href="mailto:taniya.riar@utdallas.edu" target = "_blank" style = "color: black; font-size: 25px; margin-top: -37px; margin-right: 110px; margin-left: auto;"><i class="fa fa-envelope"></i></a>
            </div>
        </div>
        <footer class = "footer" style = "padding-top: 20px;">
            <div class = "footer-container">
                <span class = "text-muted">Copyright &copy; 2019 - Fenny Mahajan, Noumika Balaji, Taniya Riar (CS6314.001 - Spring 2019)</span>
            </div>
        </footer>
    </body>
</html>
