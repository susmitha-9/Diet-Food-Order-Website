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
    <title> Cart </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/cart.css">
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
}
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"> Food </a></li>
            <li class="active" ><a href="foodlist.php"> Cart
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

<div class="bg" style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(conn.jpg);
     	height: 100vh; width: 100%; -webkit-background-size: cover; background-size: cover;
      background-position: center center; overflow: hidden;">     
  <?php
  if(!empty($_SESSION["cart"]))
  {
    ?> 
    <div class="container">
        <div class="jumbotron" style="">
          <h1>Your Cart</h1>
          <p></p>      
        </div>
        </div>
      
      <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
  <table class="table table-striped">
  
    <thead class="thead-dark" style="color: GhostWhite;background: rgba(0,0,0,0.8);">
  <tr>
  <th width="40%">Food Name</th>
  <th width="10%">Quantity</th>
  <th width="20%">Price Details</th>
  <th width="15%">Order Total</th>
  <th width="5%">Remove</th>
  </tr>
  </thead>

  <?php  
  $total = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {
  ?>
  <tr style="color: GhostWhite; background: rgba(0,0,0,0.8);">
  <td><?php echo $values["food_name"]; ?></td>
  <td><?php echo $values["food_quantity"] ?></td>
  <td>&#8377; <?php echo $values["food_price"]; ?></td>
  <td>&#8377; <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
  <td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger" style="color: Tomato;">Remove</span></a></td>
  </tr>
  <?php 
  $total = $total + ($values["food_quantity"] * $values["food_price"]);
  }
  ?>
  <tr>
  <td colspan="3" align="right" style="color: GhostWhite; background: rgba(0,0,0,0.8);color: GhostWhite;font-weight: bold;">Total</td>
  <td align="right" style="color: GhostWhite; background: rgba(0,0,0,0.8); font-weight: bold;">&#8377; <?php echo number_format($total, 2); ?></td>
  <td  style="background: rgba(0,0,0,0.8);"></td>
  </tr>
  </table>
  <?php
    echo '<a href="cart.php?action=empty"><button class="btn btn-danger"> Empty Cart </button></a>&nbsp;<a href="foodlist.php"><button class="btn btn-warning"> Continue Ordering </button></a>&nbsp;<a href="payment.php"><button class="btn btn-success pull-right"> Payment </button></a>';
  ?>
  </div>
  <br><br><br><br><br><br><br>
  <?php
  }
  if(empty($_SESSION["cart"]))
  {
    ?>

    <div class="container">
        <div class="jumbotron">
          <h1>Your Shopping Cart</h1>
          <p>No food here <a href="foodlist.php" style="color: #fb9200;">Order now</a></p>      
        </div>
      </div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <?php
  }
  ?>

  <?php

  if(isset($_POST["add"]))
  {
  if(isset($_SESSION["cart"]))
  {
  $item_array_id = array_column($_SESSION["cart"], "food_id");
  if(!in_array($_GET["id"], $item_array_id))
  {
  $count = count($_SESSION["cart"]);

  $item_array = array(
  'food_id' => $_GET["id"],
  'food_name' => $_POST["hidden_name"],
  'food_price' => $_POST["hidden_price"],
  'R_ID' => $_POST["hidden_RID"],
  'food_quantity' => $_POST["quantity"]
  );
  $_SESSION["cart"][$count] = $item_array;
  echo '<script>window.location="cart.php"</script>';
  }
  else
  {
  echo '<script>alert("Products already added to cart")</script>';
  echo '<script>window.location="cart.php"</script>';
  }
  }
  else
  {
  $item_array = array(
  'food_id' => $_GET["id"],
  'food_name' => $_POST["hidden_name"],
  'food_price' => $_POST["hidden_price"],
  'R_ID' => $_POST["hidden_RID"],
  'food_quantity' => $_POST["quantity"]
  );
  $_SESSION["cart"][0] = $item_array;
  }
  }
  if(isset($_GET["action"]))
  {
  if($_GET["action"] == "delete")
  {
  foreach($_SESSION["cart"] as $keys => $values)
  {
  if($values["food_id"] == $_GET["id"])
  {
  unset($_SESSION["cart"][$keys]);
  echo '<script>alert("Food has been removed")</script>';
  echo '<script>window.location="cart.php"</script>';
  }
  }
  }
  }

  if(isset($_GET["action"]))
  {
  if($_GET["action"] == "empty")
  {
  foreach($_SESSION["cart"] as $keys => $values)
  {
  unset($_SESSION["cart"]);
  echo '<script>alert("Cart is made empty!")</script>';
  echo '<script>window.location="cart.php"</script>';
  }
  }
  }
  ?>
  <?php

  ?>
</div>

    </body>
</html>