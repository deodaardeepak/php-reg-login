<?php
session_start();
require_once('class.phpmailer.php');
require_once('class.smtp.php');
$error=array();
 echo '<div class="container">
      <div class="content">';
if(isset($_POST['submit'])){
	if(!empty($_POST['name'])){
		$name=$_POST['name'];
	}
	if(!empty($_POST['e-mail'])){
		if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['e-mail'])){
			$email=$_POST['e-mail'];
		}
	}
	if(!empty($_POST['mob'])){
		if(strlen($_POST['mob'])== 10){
			$mob=$_POST['mob'];
		}
		else{
			echo '
        <div id="somedialog" class="dialog" style="z-index:100000;">
          <div class="dialog__overlay"></div>
          <div class="dialog__content">
            <div class="morph-shape">
              <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
                <rect x="3" y="3" fill="none" width="556" height="276"/>
              </svg>
            </div>
            <div class="dialog-inner">
              <h2>Enter correct mobile number</h2>
              <div><button class="action" data-dialog-close>Close</button></div>
            </div>
          </div>
        </div>';
		}
	}
}
echo "</div></div>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/home/bootstrap-3.3.6-dist/css/bootstrap.css">
  <link href='../css/home/fonts.css' rel='stylesheet' type='text/css'>
 <script src="../js/home/jquery.min.js"></script>
  <script src="../css/home/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
  <script src="../js/home/modernizr.js" type="text/javascript"></script>
  <link rel="stylesheet" href="../css/home/3d-rotating-navigation/css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="../css/home/3d-rotating-navigation/css/style.css"> <!-- Resource style -->
  <script src="../css/home/3d-rotating-navigation/js/modernizr.js"></script> <!-- Modernizr -->
  <link rel="stylesheet" type="text/css" href="css/normalizedialog.css" />
    <link rel="stylesheet" type="text/css" href="css/demodialog.css" />
    <!-- common styles -->
    <link rel="stylesheet" type="text/css" href="css/dialog.css" />
    <!-- individual effect -->
    <link rel="stylesheet" type="text/css" href="css/dialog-wilma.css" />
    <script src="js/modernizr.custom.dialog.js"></script>
    <style type="text/css">input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}</style>
</head>
<body>

<script src="../css/home/3d-rotating-navigation/js/jquery-2.1.1.js"></script>
<script src="../css/home/3d-rotating-navigation/js/main.js"></script> <!-- Resource jQuery -->
<script src="../css/home/back to top/js/index.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/classie.dialog.js"></script>
    <script src="js/dialogFx.js"></script>
    <script>
      (function() {

        var dlgtrigger = document.querySelector( '[data-dialog]' ),
          somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
          dlg = new DialogFx( somedialog );

        dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );

      })();
    </script>
</body>
</html>