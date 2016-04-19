<?php
ob_start();
session_start();
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Login Form</title>


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
    </head>
<body>

  
 </br>  </br>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->


     

   
        <?php

error_reporting(0);

    include ('database_connection.php');


$dbc = new mysqli('localhost', 'root', '', 'cachebuffer');
// Check connect


    if (isset($_POST['formsubmitted'])) {
    // Initialize a session:
      session_start();
    $error = array();//this array will store all error messages


    if (empty($_POST['e-mail'])) {//if the email supplied is empty 
      $error[] = 'You forgot to enter your E-mail ';
    } else {


      if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['e-mail'])) {

        $Email = $_POST['e-mail'];
      } else {
       $error[] = 'Your E-Mail Address is invalid!  ';
     }


   }


   if (empty($_POST['Password'])) {
    $error[] = 'Please Enter Your Password ';
  } else {
    $Password = $_POST['Password'];
    $Password = md5($Password);
  }


       if (empty($error))//if the array is empty , it means no error found
       { 



        $query_check_credentials = "SELECT * FROM reg_users WHERE (Email='$Email' AND password='$Password') AND Activation IS NULL";

        

        $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
        if(!$result_check_credentials){//If the QUery Failed 
          echo 'Query Failed ';
        }

        if (@mysqli_num_rows($result_check_credentials) == 1)//if Query is successfull 
        { // A match was made.




            $_SESSION = mysqli_fetch_array($result_check_credentials, MYSQLI_ASSOC);//Assign the result of this query to SESSION Global Variable

            header("Location: ../users/userhome.php");


          }else
          { 

            $msg_error= 'Either Your Account is inactive or Email address /Password is Incorrect';
          }

        }  else {



          echo '<br><br><div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">×</button> <ol>';
          foreach ($error as $key => $values) {

            echo '  <li>'.$values.'</li>';



          }
          echo '</ol></div>';

        }


        if(isset($msg_error)){

          echo '<br><br><div class="lert alert-dismissable alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button><br>'.$msg_error.' <br><br></div>';
        }
    /// var_dump($error);
        mysqli_close($dbc);

} // End of the main Submit conditional.



?>
<div class="main">
<div class="col-md-6">
      <div class="header-bottom_left">
      <?php if(!isset($_SESSION['Username'])) 
      {
        
      ?>
       
        <?php } 

        else{
          $na=$_SESSION['Username'];
          echo'<span>Welcome ';
          echo $na;
          echo '</span> &nbsp;&nbsp;<a href="logout.php">Logout</a>   ';
        }
        ?>
      </div>
     </div>
     <div class="about_banner_wrap">
            <div class="row">

</div>
        </div>
        <div class="border"> </div><center><h1 style="color:Black;font-size:200%;">Login</h1></center>

 <center>
  
 </center>
 <div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-6">
    <br>
    <br>

    <form action="logincolg.php" method="post" class="form-horizontal">
      <fieldset>

        <br>

        <div class="form-group">
         <div class="col-sm-2"></div>
          <div class="col-lg-8">
            <div class="input-group">
              <input type="text" class="form-control" id="e-mail" name="e-mail" size="235" placeholder="Enter Email">
              <span class="input-group-addon"></span></div>
            </div>
          </div>
          <div class="form-group">
           <div class="col-sm-2"></div>
            <div class="col-lg-8">
             <div class="input-group">
              <input type="password" class="form-control" id="Password" name="Password" size="25" placeholder="Enter Password">
              <span class="input-group-addon"></span></span></div>

            </div>
          </div>
          <center>
            <br>
            <button style="background-color: #3bafda;color: #ffffff;text-decoration: none;"  type="reset" class="btn primary"><span class="glyphicon glyphicon-refresh"></span>&nbspReset</button>&nbsp&nbsp&nbsp
            <input type="hidden" name="formsubmitted" value="TRUE" />
            <button  style="background-color: #ff4d4d;color: #ffffff;text-decoration: none;"  type="submit" class="btn primary"><span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspLogin</button></center>
            <br>
       
          </div>
        </div>
      </fieldset>
    </form>

 <center><a href="forgotpass.php"><button  style="background-color: #ff4d4d;color: #ffffff;text-decoration: none;"  type="submit" class="btn primary"><span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspForgot Password? Reset here</button></a>
    </center>    

</div>


<div class="col-md-3"></div></center>
</div>

<br><br>


</div>


<script src="../css/home/3d-rotating-navigation/js/jquery-2.1.1.js"></script>
<script src="../css/home/3d-rotating-navigation/js/main.js"></script> <!-- Resource jQuery -->
<script src="../css/home/back to top/js/index.js"></script>

<script src="../js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>