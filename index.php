<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);

	
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link rel="shortcut icon" href="img/icon.ico">

<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="shortcut icon" href="favicon.ico">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
  
 <div class="panel panel-default">
  <div align="center" class="t1"><span><?php include("include/title.php"); //class="panel-heading" ?></span></div>
  <div class="panel-body">
   <h3 align="center"></h3>
  </div>
</div>
 <!--start content area-->
<div class="row">
			<div class="col-lg-4">
				<img src="img/aa.jpg" width="346" height="199" />
				<!-- A grey horizontal navbar that becomes vertical on small screens -->
			</div>
			
			
			
            <div class="col-lg-4">
              <div class="card">
                
                <div class="card-block">
                  <p id="link" align="center"><a href="login.php">Manufacturer</a></p>
                  <p id="link" align="center"><a href="login_sup.php">Supplier</a></p>
				  <p id="link" align="center"><a href="login_shop.php">Retailer</a></p>
                  <p id="link" align="center"><a href="login_cus.php">Customer</a></p>
			    </div>
              </div>
			</div>
			
			
			<div class="col-lg-4">
				<img src="img/bb.jpg" width="364" height="241" />			</div>  
</div>
<!--end content area-->
  <p align="center" class="msg"><?php
  if($msg!="")
  {
  echo $msg;
  }
  ?></p>
  <p align="center"><a href="login_admin.php">Medical Department</a></p>
  <p>&nbsp;</p>
</body>
</html>