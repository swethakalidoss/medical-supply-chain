<?php
session_start();
include("include/dbconnect.php");
include("encrypt_msg.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];


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
	<script language="javascript">
function getText()
{

document.form1.pcode.focus();
}
</script>

</head>

<body onload="getText()">
  
 <div class="panel panel-default">
  <div align="center" class="t1"><span><?php include("include/title.php"); ?></span></div>
  
</div>
<?php //include("link_cus.php"); ?>
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
  <strong>Warning!</strong> Invalid Product Number!
</div>
<?php
}
?>			

<h3 align="center">Verification in Blockchain </h3>
<div class="row">
			<div class="col-lg-3">
				
				<!-- A grey horizontal navbar that becomes vertical on small screens -->
			</div>
 
			
			
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display display">
                    <h2> Product</h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  <form name="form1" method="post">
                    
                    <div class="form-group">
                      <label>Enter the Product Number</label>
					  <input type="text" name="pcode" class="form-control" />
                      
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
  <?php
  
if(isset($btn))
{
$q11=mysql_query("select * from sc_product where pcode='$pcode'");
$r11=mysql_fetch_array($q11);
$pid=$r11['id'];


  $qry=mysql_query("select * from sc_blockchain where block_id=$pid");
  $num=mysql_num_rows($qry);
  if($num>0)
  {
  ?>
  <h3 align="center">Product Details from Blockchain </h3>
   <table width="90%" align="center">
				<thead>
				  <tr>
					<th width="6%" class="card-primary">Sno</th>
					<th width="94%" class="card-primary">Details</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				$i=0;
				while($row=mysql_fetch_array($qry))
				{
				$i++;
				
				
				?>
				  <tr>
					<td><?php echo $i; ?></td>
					<td><?php 
					echo $row['sdata'];
					//echo Encode(hex2bin($row['hash_value']),"xyz"); ?></td>
				  </tr>
				  <?php

				  }
				  ?>
				</tbody>
</table>
	   <?php
	   
	  $q31=mysql_query("select * from sc_blockchain where block_id=$pid order by id limit 0,1");
	 $r31=mysql_fetch_array($q31);
	 $v1=explode(",",$r31['sdata']);
	 $v2=explode(":",$v1[3]);
	 $v3=$v2[1];
	 	$dy=(strtotime($v3)-strtotime($rdate))/(24*60*60);
			if($dy<=0)
			{
			?><h3 style="color:#FF0000;" align="center">This Product has Expired!!</h3><?php
			}
	   }
	   else
	   {
	   ?>
		 <script language="javascript">
		 window.location.href="cus_open.php?act=wrong&pid=<?php echo $pid; ?>";
		 </script>
		 <?php
	   }
	   
	   
	 }
	   ?>
  <p>&nbsp;</p>
</body>
</html>