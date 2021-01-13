<?php
session_start();
include("include/dbconnect.php");
include("encrypt_msg.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$rdate=date("d-m-Y");
if($act=="remove")
{
mysql_query("update sc_product set status=3 where id=$pid");
mysql_query("delete from sc_cart where id=$cid");
?>
		 <script language="javascript">
		 window.location.href="cus_cart.php?shop=<?php echo $shop; ?>";
		 </script>
		 <?php
}	

if(isset($btn2))
{
 ?>
		 <script language="javascript">
		 window.location.href="cus_pay.php?shop=<?php echo $shop; ?>";
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
  <form name="name" method="post" enctype="multipart/form-data">
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
                    <h2>Cart Details</h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  
                    
					<div class="form-group">
                      <label>Shop</label>
					  <select name="shop" class="form-control">
                      <?php
					  $spq=mysql_query("select distinct(shop) from sc_cart where uname='$uname'");
					  while($spr=mysql_fetch_array($spq))
					  {
					  ?>
					  <option <?php if($shop==$spr['shop']) echo "selected"; ?>><?php echo $spr['shop']; ?></option>
					  <?php
					  }
					  ?>
					  </select>
                    </div>
                    
                    <div class="form-group">       
                      <input type="submit" name="btn" value="Submit" class="btn btn-primary">
                    </div>
                 
                </div>
              </div>
  </div> 
</div>

<!--end content area-->
  <p>&nbsp;</p>
  <?php
 if(isset($btn))
 {

  $qry=mysql_query("select * from sc_cart where uname='$uname' && shop='$shop' && status=0");
  $num=mysql_num_rows($qry);
  if($num>0)
  {
  ?>
  <h3 align="center">View Cart</h3>
   <table width="90%" align="center">
				<thead>
				  <tr>
					<th class="card-primary">Sno</th>
					<th class="card-primary">Product</th>
					
				    <th class="card-primary">Rate</th>
				    <th class="card-primary">Details</th>
				    <th class="card-primary">Action</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				$i=0;
				$tot=0;
				while($row=mysql_fetch_array($qry))
				{
				$i++;
				$qry1=mysql_query("select * from sc_product where id=".$row['pid']."");
				$row1=mysql_fetch_array($qry1);
				$tot+=$row1['price'];
				?>
				  <tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row1['product']; ?></td>
					
					
				    <td><?php echo $row1['price']; ?></td>
				    <td><?php echo $row1['description']; ?></td>
				    <td><?php echo '<a href="cus_cart.php?act=remove&cid='.$row['id'].'&pid='.$row['pid'].'&shop='.$shop.'">Remove</a>'; ?></td>
				  </tr>
				  <?php

				  }
				  ?>
				</tbody>
</table>
<h3 align="center">Total Amount: Rs. <?php echo $tot; ?></h3>
<p align="center"><input type="submit" name="btn2" value="Buy" /></p>

	   <?php
	   }
	   }
	   ?>
  <p>&nbsp;</p>
 </form>
</body>
</html>