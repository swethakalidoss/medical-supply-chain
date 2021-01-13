<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$q1=mysql_query("select * from sc_company where uname='$uname'");
$r1=mysql_fetch_array($q1);
$company=$r1['name'];

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
<script language="javascript">
function getText()
{

document.form1.pcode.focus();
}
</script>
</head>

<body onload="getText()">
  
 <div class="panel panel-default">
  <div  class="t1" align="center"><span><?php include("include/title.php"); ?></span></div>
  
</div>
<?php include("link_man.php"); ?>
 <!--start content area-->
  <?php
if($_REQUEST['act']=="success")
{
?>
<div class="alert alert-success">
  <strong>New Product Added Success!</strong> 
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
                    <h2>New Product</h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  <form name="form1" method="post">
                   
					<div class="form-group">
                      <label>Product</label>
                      <input type="text" name="pcode" placeholder="" class="form-control">
                    </div>
                 
					
					<!--<div class="form-group">
                      <label>Product Photo</label>
                      <input type="file" name="file">
                    </div>-->
					
                    <div class="form-group">       
                      <input type="submit" name="btn" value="Submit" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
</div>
 <?php
 $msg="";
	 	$rdate=date("d-m-Y");
		$yr=date("y");
	 if(isset($btn))
	 {
                                                      
	$_SESSION['pcode']=$pcode;
		 ?>
		 <script language="javascript">
		 window.location.href="man_home.php";
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