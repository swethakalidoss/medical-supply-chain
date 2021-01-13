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
  <div class="t1" align="center"><spa><?php include("include/title.php"); ?></span></div>
  <div class="panel-body">
   <h3 align="center"></h3>
  </div>
</div>
 <!--start content area-->
 <?php
if($_REQUEST['act']=="success")
{
?>
<div class="alert alert-success">
  <strong>Register Success!</strong> 
</div>
<?php
}
if($_REQUEST['act']=="wrong")
{
?>

<div class="alert alert-warning">
  <strong>Warning!</strong> This Username already exist!
</div>
<?php
}
?>		
<div class="row">
			<div class="col-lg-3">
				
				<!-- A grey horizontal navbar that becomes vertical on small screens -->
			</div>
 	
			
			
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display display">
                    <h2>Supplier</h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  <form name="form1" method="post" enctype="multipart/form-data">
                    
					<div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control">
                    </div>
               
					<div class="form-group">
                      <label>Mobile No.</label>
                      <input type="text" name="mobile" class="form-control">
                    </div>
                   <div class="form-group">
                      <label>E-mail</label>
                      <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="uname" class="form-control">
                    </div>
					<div class="form-group">
                      <label>Password</label>
                      <input type="password" name="pass" class="form-control">
                    </div>
                                                                                               
                     <div class="form-group">
                      <label>Re-type Password</label>
                      <input type="password" name="cpass" class="form-control">
                    </div>
					
					
                    <div class="form-group">       
                      <input type="submit" name="btn" value="Register" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
			  <a href="index.php">Home</a> |
			  <a href="login_sup.php">Login</a>
</div>
 <?php
 $msg="";
	 	$rdate=date("d-m-Y");
		$yr=date("y");
	 if(isset($btn))
	 {
                                                      
			
	 $mq=mysql_query("select max(id) from sc_supplier");
	 $mr=mysql_fetch_array($mq);
	 $id=$mr['max(id)']+1;
	
	 $ins=mysql_query("insert into sc_supplier(id,name,address,mobile,email,uname,pass,rdate) values($id,'$name','$address','$mobile','$email','$uname','$pass','$rdate')");
                 
	 ?>
	 <script language="javascript">
	 window.location.href="reg_sup.php?act=success";
	 </script>
	 <?php
	 	
	 }
	 ?>
<!--end content area-->
  <p align="center" class="msg"><?php
  if($msg!="")
  {
  echo $msg;
  }
  ?></p>
  <p>&nbsp;</p>
</body>
</html>