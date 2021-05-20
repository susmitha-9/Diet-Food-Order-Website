<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); 
}
unset($_SESSION["cart"]);
?>

<html>

  <head>
    <title> Cart </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/COD.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>

    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };
      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>
<?php
if(isset($_SESSION['login_user1'])){
?>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"> Food </a></li>
            <li><a href="cart.php"> Cart
             (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
              </a></li>
            <li><a href="logout_u.php"> Logout </a></li>
          </ul>
  <?php        
}
else {
  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> Sign-up</a></li>
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> Login</a></li>
            </ul>
            </li>
          </ul>
<?php
}
?>
        </div>
      </div>
    </nav>

<div class="bg" style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(conn.jpg);
     	height: 100vh; width: 100%; -webkit-background-size: cover; background-size: cover;
      background-position: center center; overflow: hidden;">
          <div class="container">
            <div class="jumbotron">
              <h1 class="text-center" style="color: black;"> Order Placed Successfully.</h1>
            </div>
          </div>
          <br>

  <h2 class="text-center" style="color: GhostWhite;font-weight: bold;"> Thank you for Ordering! Enjoy the Taste of Eating Right.</h2>
  <a href="foodlist.php" style="width: 20px;margin-left: 600px; position: relative; display: block; bottom: -20px;"><button class="btn btn-success"> Keep Ordering </button></a>
  <h2 class="text-center" style="color: GhostWhite;font-weight: bold; margin-top: 4%"> Stay Safe and Healthy.</h2>
  <?php 
    $num1 = rand(100000,999999); 
    $num2 = rand(100000,999999); 
    $num3 = rand(100000,999999);
    $number = $num1.$num2.$num3;
  ?>
</div>  
        </body>

</html>