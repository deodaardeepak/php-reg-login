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
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Reset Password</title>


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
      
      <span></span>
    </a>
  </header>


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
  <!---->
   


	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->


     



  <?php



  include ('database_connection.php');
  require_once('class.phpmailer.php');
  require_once('class.smtp.php');
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


       if (empty($error))//if the array is empty , it means no error found
       { 



       	$query_check_credentials = "SELECT * FROM reg_users WHERE (Email='$Email') AND Activation IS NULL";
 $dbc = mysqli_connect("localhost","username","databasename","password");

    
       	

       	$result_check_credentials = mysqli_query($dbc, $query_check_credentials);
        if(!$result_check_credentials){//If the QUery Failed 
        	echo 'Query Failed ';
        }

        if (@mysqli_num_rows($result_check_credentials) == 1)//if Query is successfull 
        { // A match was made.




            $res = mysqli_fetch_array($result_check_credentials, MYSQLI_ASSOC);//Assign the result of this query to SESSION Global Variable
            $id=$res['Memberid'];

            $ranstr = substr(str_shuffle(MD5(microtime())), 0, 8);


            $query_insert = "INSERT INTO `pwdrec` ( `id`, `string`) VALUES ( '$id', '$ranstr')";


            $result_insert = mysqli_query($dbc, $query_insert);

            $message = " To reset your account, please click on this link: ";
            $message .= "http://localhost/ddb/registrations/pwdreset.php and enter the temporary password given along with the new password."  ;
            $message.="\n\nThe Temporary password is :";
            $message.=$ranstr;
            
        

             $mail = new PHPMailer(); // create a new object
              $mail->IsSMTP(); // enable SMTP
           //   $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only default=0 no error and no msgs.
              $mail->SMTPAuth = true; // authentication enabled
              $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
              $mail->Host = "smtp.gmail.com";
              $mail->Port = 465; // or 587 or 465
              $mail->IsHTML(true);
              $mail->Username = "email@gmail.com";
              $mail->Password = "password";
              $mail->SetFrom("email@gmail.com");
              $mail->Subject = "Your Account Reset Instructions";
              $mail->Body = $message;
              $mail->AddAddress($Email);
              $mail->Send();





              header("Location: pwdsubmit.php");


          }else
          { 

          	$msg_error= 'Either Your Account is not present or is inactive or Email address is Incorrect';
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
        <span style="font-size:100%;" class="flk"><a style="color:#ffffff;" href="../../reg/login.php">Login</a> |<a style="color:#ffffff;" href="reg/"> Register</a></span>
        <?php } 
        else{
          $na=$_SESSION['Username'];
          echo'<span>Welcome ';
          echo $na;
          echo '</span> &nbsp;&nbsp;<a href="php-reg-login/reg/logout.php">Logout</a>   ';
        }
        ?>
      </div>
     </div>
	
	<div class="about_banner_wrap">
		<div class="row">

</div>  
	</div></center>
	<div class="border"> </div><center><h1 style="color:white;font-size:200%;">Register</h1></center>
	<br><br>

	<center>
		<h2 style="color: #ffffff;">Register.</h2>
	</center>


	<div class="row">

		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<br>
			<br>

			<form action="forgotpass.php" method="post" class="form-horizontal">
				<fieldset>

					<br>

					<div class="form-group">
						<div class="col-md-3"></div>
						<div class="col-lg-7">
							<div class="input-group">
								<input type="text" class="form-control" id="e-mail" name="e-mail" size="235" placeholder="Enter Email to reset">
								<span class="input-group-addon"></span></div>
							</div>
						</div>

						<center>
							<br>
							<button style="background-color: #3bafda;color: #ffffff;text-decoration: none;" type="reset" class="btn primary"><span class="glyphicon glyphicon-refresh"></span>&nbspReset</button>&nbsp&nbsp&nbsp
							<input type="hidden" name="formsubmitted" value="TRUE" />
							<button style="background-color: #ff4d4d;color: #ffffff;text-decoration: none;" type="submit" class="btn primary"><span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspSubmit</button></center>
							<br>
							<br>
						</div>
					</div>
				</fieldset>
			</form>
		</div>


		<div class="col-md-2"></div>
	</div>
</div>





<script src="../css/home/3d-rotating-navigation/js/jquery-2.1.1.js"></script>
<script src="../css/home/3d-rotating-navigation/js/main.js"></script> <!-- Resource jQuery -->
<script src="../css/home/back to top/js/index.js"></script>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
