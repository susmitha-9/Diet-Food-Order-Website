<?php
session_start();
?>

<html>
  <head>
    <title> Home </title>
    <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
    <link rel="stylesheet" type = "text/css" href ="css/index.css">
  </head>

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
            <li class="active" ><a href="index.php">Home</a></li>
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

<div class="container-fluid p-0" style="background: url(bg.jpg) no-repeat;
    background-size: cover;
    height: calc(100vh);">
    <p style="font-family: Helvetica; font-size: 320%;font-weight: bold;margin-left: 50px;position: absolute;margin-top: 100px;text-shadow: 2px 2px 10px #999999;">THE CROP STORY

    </p>
    <p style="font-family: Helvetica; font-size: 200%;margin-left: 50px;position: absolute;margin-top: 215px;text-shadow: 2px 2px 10px #999999;">“Healthy does NOT mean starving yourself EVER. <br> Healthy means eating the right food in the right amount.”
    </p>

    <a href="customerlogin.php";
    style="font-family: Arial; margin-left: 50px;position: absolute;margin-top: 330px;background: #fb9200;padding: 10px;border: 0;border-radius: 30px;color: #fff;padding-left: 30px;padding-right: 30px;-webkit-box-shadow: 10px 13px 38px -19px rgba(251,146,0,1);
  -moz-box-shadow: 10px 13px 38px -19px rgba(251,146,0,1);
  box-shadow: 10px 13px 38px -19px rgba(251,146,0,1);">Order Now</a>
</div>
 
</body>
</html>