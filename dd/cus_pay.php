<?php
session_start();
include("include/dbconnect.php");
include("encrypt_msg.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];

$q11=mysql_query("select * from sc_customer where uname='$uname'");
$r11=mysql_fetch_array($q11);
$mobile=$r11['mobile'];

$rdate=date("d-m-Y");
$amt=0;
$q1=mysql_query("select * from sc_cart where uname='$uname' && status=0 && shop='$shop'");
	while($r1=mysql_fetch_array($q1))
	{
	$amt+=$r1['amount'];
	}
if(isset($btn))
{
$rnd=rand(1000,9999);
mysql_query("update sc_customer set otp='$rnd' where uname='$uname'");
$message="OTP:$rnd";

//echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$message.'&number=91'.$mobile.'" style="display:none"></iframe>';
$msg="Sending OTP for Verification......";
?>
	<script language="javascript">
	//window.location.href="../admin/en_home.php";
        setTimeout("callitrept()", 5000);
        function callitrept() {
		window.location.href="cus_otp.php?shop=<?php echo $shop; ?>";
        }
	</script>
	<?php

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link rel="shortcut icon" href="img/icon.ico">
<style type="text/css">
<!--
.box {
	background-color: #F3F3F3;
	height: 270px;
	width: 270px;
	border: 1px solid #A8A8A8;
	padding:10px;
}
.box1 {
	background-color: #F3F3F3;
	height: 100px;
	width: 270px;
	border: 1px solid #A8A8A8;
	padding:10px;
}
.box2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
	padding:10px;
}
.box3 {
padding:10px;
}
.t1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 24px;
	font-weight: bold;
	color: #0066CC;
	font-variant: small-caps;
	text-transform: none;
}
.msg {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FF0000;
}
.box4
{
width:250px;
height:35px;
}
-->
</style>
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
  <div align="center" class="t1"><span><?php include("include/title.php"); ?></span></div>
  
</div>
<?php include("link_cus.php"); ?>
 <!--start content area-->
 <?php
if($_REQUEST['act']=="success")
{
?>
<div class="alert alert-success">
  <strong>Purchased Success!</strong> 
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

<h3 align="center">Welcome Customer (<?php echo $uname; ?>)</h3>
<div class="row">
			<div class="col-lg-3">
				
				<!-- A grey horizontal navbar that becomes vertical on small screens -->
			</div>
 
			
			
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display display">
                    <h2>Payment</h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  <form name="name" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Total Amount</label>
					  Rs. <?php echo $amt; ?>
					</div>  
					<div class="form-group">
                      <label>Bank</label>
					  <select name="bank" class="form-control">
                      <option>SBI</option>
					  <option>IB</option>
					  <option>IOB</option>
					  <option>LVB</option>
					  <option>CUB</option>
					  <option>KVB</option>
					  </select>
                    </div>
                    <div class="form-group">
                      <label>Card No.</label>
					  <input type="text" name="card" class="form-control" required />
                      
                    </div>
                    <div class="form-group">       
                      <input type="submit" name="btn" value="Payment" class="btn btn-primary">
                    </div>
                  </form>
				  <?php
				  echo $msg;
				  ?>
                </div>
              </div>
  </div> 
</div>

<!--end content area-->
  <p>&nbsp;</p>

</body>
</html>