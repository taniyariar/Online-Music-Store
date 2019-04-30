<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header("Location:signin.html");
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shop | The Music Store</title>
        <meta charset = "UTF-8">
        <meta http-equiv="content-type" context = "text/html">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<link rel = "icon" href = "img/logo.png" type = "image/png" sizes = "16x16">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity = "sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin = "anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity = "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin = "anonymous"></script>
        <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity = "sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin = "anonymous">
        <link rel = "stylesheet" href = "css/musichomepage.css">
        <!-- <script type = "text/javascript" src = "js/musichomepage.js"></script> -->
        <script type = "text/javascript" src = "js/populateData.js"></script>
    </head>
    <style media="screen">
    .pagination a {
        color: white;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
      }
    .pagination {
        display: inline-block;
      }
      .pagination_link{
        border: 2px solid white;
      }
      .pagination a:hover:not(.active) {background-color: #ddd;color:black;}
      .center{
        text-align: center;
      }
      #info-box{
          background-color:grey;
          position:absolute;
          width:auto;
          height:auto;
          border: 3px solid black;
          color:white;
      }
      </style>
    <script type="text/javascript">
    function addToCart(k){
      $.ajax({
        url:"php/addToCart.php",
        type:"POST",
        data:{id:k},
        dataType:"json",
        success:function(response){
          if(response.status == "added"){
            $("#counter").val(response.counter);
            alert("Item added to Cart !!!");
          }
          else if (response.status == "purchased") {
            alert("Item already in Purchased. Check your order history !!!");
          }
          else{
            alert("Item already in Cart !!!");
          }
        },
        error:function(){}
      });
    }
    function detailsShow(g,i,y,d){
    }
    </script>
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
                <input type = "text" name = "counter" id = "counter" value = "0" style = "font-size: 15px; margin-top: -30px; margin-right: -315px; color: white; width: 20px; background: black; text-decoration: none; border: none;" />
                <ul class = "nav navbar-nav navbar-right" style = "margin-top: 5px;">
                    <li>
                        <form id="search-form" class = "form-inline my-2 my-lg-0">
                            <input id="searchItem" class = "form-control mr-sm-2" type = "search" placeholder = "Search" aria-label = "Search">
                            <button id="search-btn" class = "btn btn-primary ">Search</button>
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
                <?php
                  if($_SESSION['level'] == 'a'){
                    echo "<p class = 'aboutUs' style = 'float: left; font-size: 18px; color: white; margin-left: -180px; margin-top: 38px;'><a href = 'adminpage.php' style = 'color: white;'>Admin Controls</a></p>";
                  }
                 ?>
                <!--<p class = "aboutUs" style = "float: left; font-size: 18px; color: white; margin-left: -180px; margin-top: 38px;"><a href = "aboutus.html" style = "color: white;">#AboutUs</a></p>-->
                <h1 style = "font-family: Georgia, 'Times New Roman', Times, serif; font-size: 60px; color: white;">The Music Store</h1>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter-square"></i>
                <p class = "meetTheTeam" style = "float: right; font-size: 18px; color: white; margin-right: -181px; margin-top: -40px;"><a href = "meettheteam.php" style = "color: white;">#MeetTheTeam</a></p>
                <p style = "font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px; color: white;">Latest Albums  &bull;  Greatest Hits  &bull;  Billboard Chartbusters</p>

            </div>
        </div>

        <!-- Filter -->
        <div id = "filterSection">
            <ul class = "filter" style = "text-align: center; align-content: center; font-size: 25px; line-height: 20px; color: white; display: inline;">
                <li>Filter by Genre:</li>
                <li>
                    <input type = "checkbox"  value = "Rock">
                    <label>Rock</label>
                </li>
                <li>
                    <input type = "checkbox"  value = "Pop">
                    <label>Pop</label>
                </li>
                <li>
                    <input type = "checkbox" value = "Indie">
                    <label>Indie</label>
                </li>
                <li>
                    <input type = "checkbox"  value = "Classic">
                    <label>Classic</label>
                </li>
                <li>
                    <input type = "checkbox"  value = "Dance">
                    <label>Dance</label>
                </li>
                <li>
                    <input type = "checkbox" value = "Electronic">
                    <label>Electronic</label>
                </li>
                    <button id="filter-btn" class = "btn btn-primary ">Filter</button>
                <li>

                </li>
            </ul>
        </div>
        <div class="center">
          <div class="pagination">
          </div>
        </div>
        <div id='album'>
          <ul id="album-data">
          </ul>
        </div>
        <footer class = "footer" style = "bottom:0;
        width: 100%;
        height: 2em;
        background: #333333;
        color: white;
        font-size: small;
        position:fixed;
        text-align: center;">
            <div class = "footer-container">
                <span class = "text-muted">Copyright &copy; 2019 - Fenny Mahajan, Noumika Balaji, Taniya Riar (CS6314.001 - Spring 2019)</span>
            </div>
        </footer>
    </body>
</html>
