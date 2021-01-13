<?php
session_start();
include("include/dbconnect.php");
include("encrypt_msg.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];

$q11=mysql_query("select * from sc_customer where uname='$uname'");
$r11=mysql_fetch_array($q11);
$key=$r11['otp'];

$rdate=date("d-m-Y");
$amt=0;
$q3=mysql_query("select * from sc_cart where uname='$uname' && status=0 && shop='$shop'");
		while($r3=mysql_fetch_array($q3))
		{
		$amt+=$r3['amount'];
		}


if(isset($btn))
{
	if($otp==$key)
	{
	
	$mq=mysql_query("select max(id) from sc_purchase");
		 $mr=mysql_fetch_array($mq);
	 $id=$mr['max(id)']+1;
	 mysql_query("insert into sc_purchase(id,uname,shop,amount,rdate) values($id,'$uname','$shop','$amt','$rdate')");
	 
	
$q1=mysql_query("select * from sc_cart where uname='$uname' && status=0 && shop='$shop'");
		while($r1=mysql_fetch_array($q1))
		{
		$prid=$r1['pid'];
		$q2=mysql_query("select * from sc_product where id=$prid");
		$r2=mysql_fetch_array($q2);
		$prd=$r2['product'];
		
		 $mq2=mysql_query("select max(id) from sc_blockchain");
		 $mr2=mysql_fetch_array($mq2);
		 $id2=$mr2['max(id)']+1;
		 $data="$rdate,Purchase Product:$prd,Product ID:$prid,Retailer:$shop,Customer:$uname";
		$hash=bin2hex(Encode($data,"xyz"));
		mysql_query("insert into sc_blockchain(id,block_id,hash_value) values($id2,'$prid','$hash')");
		
		mysql_query("update sc_cart set status=1,purchaseid=$id,rdate='$rdate' where id=".$r1['id']."");
		mysql_query("update sc_product set status=5 where id=$prid");
		}
		
	?>
		 <script language="javascript">
		 window.location.href="cus_otp.php?act=success&shop=<?php echo $shop; ?>";
		 </script>
		 <?php
	
	}
	else
	{
	?>
		 <script language="javascript">
		 window.location.href="cus_otp.php?act=wrong&shop=<?php echo $shop; ?>";
		 </script>
		 <?php
	}

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
  <strong>Purchased and Paid Success!</strong> 
</div>
<?php
}
if($_REQUEST['act']=="wrong")
{
?>

<div class="alert alert-warning">
  <strong>Warning!</strong> Your OTP was wrong!
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
                      <label>Enter your OTP</label>
					  <input type="password" name="otp" class="form-control" />
                      
                    </div>
                    <div class="form-group">       
                      <input type="submit" name="btn" value="Submit" class="btn btn-primary">
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