<?php
include('login_u.php'); 

if(isset($_SESSION['login_user2'])){
header("location: foodlist.php"); 
}
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Login</title>
  </head>

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
            <li ><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
          <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> Sign Up</a></li>    
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php">Login</a></li>
            </ul>
            </li>
          </ul>

        </div>
      </div>
    </nav>

    <div class="container" style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(diet.png);
     	height: 100vh; width: 100%; -webkit-background-size: cover; background-size: cover;
      background-position: center center; overflow: hidden; margin-top: 1%;">

      <div class="col-md-5 col-md-offset-4" style="margin-top: 8%; margin-bottom: 1%;">
        <label style="margin-left: 5px;color: red;"><span> <?php echo $error;  ?> </span></label>
      <div class="panel panel-primary" style=" width: 500px; height: 400px; 
	background: rgba(0,0,0,0.8); border-radius: 25px;border: 1px solid #fb9200;" >
        <h4 style="color: #fb9200;margin-left: 30%;text-shadow: 2px 2px 10px #fb9200;"> Kindly Login to continue </h4>
        
        <div class="panel-body">
        <form action="" method="POST">
          
        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span class="text-danger" style="color: #fb9200; margin-right: 5px;">*</span> Username: </label>
            <div class="input-group">
              <input class="form-control"style=" width: 200px; padding: 10px 10px 10px 5px;
	background: rgba(0,0,0,0.8); border: 1px solid #fb9200;" id="username" type="text" name="username" placeholder="Username" required="" autofocus="">
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
            <div class="input-group">
              <input class="form-control" style=" width: 200px; padding: 10px 10px 10px 5px; 
	background: rgba(0,0,0,0.8); border: 1px solid #fb9200;" id="password" type="password" name="password" placeholder="Password" required="">         
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-4">
              <button class="btn btn-primary" style="background-color: #fb9200;border: 1px solid #fb9200;" name="submit" type="submit" value=" Login ">Submit</button>
          </div>

        </div>
        <label style="margin-left: 5px;">Don't have an account?</label> <br>
       <label style="margin-left: 5px;"><a href="customersignup.php" style="color: #fb9200;">Create a new account</a></label>

        </form>
        </div>     
      </div>      
    </div>
  </div>

    </body>
</html>