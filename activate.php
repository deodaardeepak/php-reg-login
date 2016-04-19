<?php
session_start();
ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Activate Your Account</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    
  <link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<!-- Theme CSS -->
<link href="css/style.css" rel="stylesheet">

 <?php
      include('headlinks.php');
      ?>


    <style type="text/css">
        body{color:white;}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->


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
</header>   
     <?php
     $dbc = mysqli_connect("localhost","root","","cachebuffer");

     if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email']))
     {
        $email = $_GET['email'];
    }
if (isset($_GET['key']) && (strlen($_GET['key']) == 32))//The Activation key will always be 32 since it is MD5 Hash
{
    $key = $_GET['key'];
}


if (isset($email) && isset($key))
{

    // Update the database to set the "activation" field to null

    $query_activate_account = "UPDATE reg_users SET Activation=NULL WHERE(Email ='$email' AND Activation='$key')LIMIT 1";


    $result_activate_account = mysqli_query($dbc, $query_activate_account) ;

    // Print a customized message:
    if (mysqli_affected_rows($dbc) == 1)//if update query was successfull
    {

        echo '<div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>Your account is now active. Goto 
        <a href="#"> Login Page</a> or Goto   <a href="http://djtrinity.in"> Main Page</a>
    </div>';

} else
{
    echo '<div class="alert alert-dismissable alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>Oops !Your account could not be activated. Please recheck the link or contact the system administrator.</div>';

}

mysqli_close($dbc);

} else {
    echo '<div class="alert alert-dismissable alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>Error Occured .</div>';
}


?>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>