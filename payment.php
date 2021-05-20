<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); 
}
?>

<html>

  <head>
    <title> Payment </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/payment.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  
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
              <li> <a href="customersignup.php"> Sign Up</a></li>
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

 <?php
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {

    $F_ID = $values["food_id"];
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $username = $_SESSION["login_user2"];
    $order_date = date('Y-m-d');
    
    $gtotal = $gtotal + $total;

     $query = "INSERT INTO ORDERS (F_ID, foodname, price,  quantity, order_date, username) 
              VALUES ('" . $F_ID . "','" . $foodname . "','" . $price . "','" . $quantity . "','" . $order_date . "','" . $username . "')";
             
              $success = $conn->query($query);         

      if(!$success)
      {
        ?>
        <?php
      }     
  }
        ?>
        
<div class="bg" style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(conn.jpg);
     	height: 100vh; width: 100%; -webkit-background-size: cover; background-size: cover;
      background-position: center center; overflow: hidden;">  

          <div class="container">
            <div class="jumbotron">
              <h1>Choose your payment option</h1>
            </div>
          </div>
          <br>

  <h1 class="text-center" style="color: GhostWhite;font-weight: bold;">Total: &#8377;<?php echo "$gtotal"; ?>/-</h1>
  <h5 class="text-center"></h5>
  <br>

    <a href="cart.php" style="margin-left: 400px; position: relative; display: block; padding-top: 5%;"><button class="btn btn-warning"> Back to cart</button></a>

  <div class="razorpay-embed-btn" style="margin-left: 600px; position: relative; display: block;bottom: 9%;" data-url="https://pages.razorpay.com/pl_HB6CmxTdlPb7id/view" data-text="Pay Now" data-color="#528FF0" data-size="small">
    <script>
      (function(){
        var d=document; var x=!d.getElementById('razorpay-embed-btn-js')
        if(x){ var s=d.createElement('script'); s.defer=!0;s.id='razorpay-embed-btn-js';
        s.src='https://cdn.razorpay.com/static/embed_btn/bundle.js';d.body.appendChild(s);} else{var rzp=window['__rzp__'];
        rzp && rzp.init && rzp.init()}})();
    </script>
  </div>
    <a href="COD.php" style="margin-left: 850px; position: relative; display: block; bottom: 135px; "><button class="btn btn-success"> Cash On Delivery</button></a>
</div>
        </body>
</html>