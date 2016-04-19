<?php 
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   
  <link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<!-- Theme CSS -->
<link href="css/style.css" rel="stylesheet">
   

      <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />  
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="../js/jquery.min.js"></script>
    <!-- //grid-slider -->


  <?php
      include('headlinks.php');
      ?>
   <title>Reset Password </title>

</head>

<body>
  
  
<header id="home">
  <section id="navigation">
  <div class="navbar navbar-inverse navbar-static-top" id="nav">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <!--<a class="navbar-brand logo" href=""><img src="images/logo2.png"></a>-->
      </div>
      <div class="collapse navbar-collapse pull-leftXX">
        <ul class="nav navbar-nav">
          <li class="active"><a href="../index.html">Home</a></li>
          <li><a href="#about">About Us</a></li>
         <li><a href="logincolg.php">Login</a></li>
          <li><a href="colgreg.php">Sign up</a></li>
          <li><a href="#clients">Quotes</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="pull-right top-social text-center">
          <a href="#download"><span class="fa fa-facebook"></span></a>
          <a href="#facebook"><span class="fa fa-twitter"></span></a>
          <a href="#twitter"><span class="fa fa-google-plus"></span></a>
          <a href="#share"><span class="fa fa-pinterest"></span></a>
        </div>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>
  </section>
</header>   </br>  </br>





    <center>
      
 </center>

 <br><br>

 <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <center>
      <h3>Please check your E-mail for further instructions to reset the password. Thank You!</h3><br>
      <a href="pwdreset.php" class="btn btn-danger">Reset password</a>
   
      </center>


</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
