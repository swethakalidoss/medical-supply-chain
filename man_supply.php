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
<?php include("link_man.php"); ?>
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
                    <h2>Supplied Products </h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  <form name="name" method="post" enctype="multipart/form-data">
                    
					<div class="form-group">
                      <label>Category</label>
                      <select name="category" class="form-control">
					  <option value="">-All-</option>
					  <?php
					  $qcat=mysql_query("select * from sc_category");
					  while($rcat=mysql_fetch_array($qcat))
						{
					  ?>
					  <option <?php if($category==$rcat['category']) echo "selected"; ?>><?php echo $rcat['category']; ?></option>
					  <?php
					  }
					  ?>
					  </select>
                    </div>
                    
                    <div class="form-group">       
                      <input type="submit" name="btn" value="Submit" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
  </div> 
</div>

<!--end content area-->
  <p>&nbsp;</p>
  <?php
  if($category!='')
	{
	$q=" && category='$category'"; 
	}
	else
	{
	$q="";
	}
  $qry=mysql_query("select * from sc_product where status=2 $q");
  $num=mysql_num_rows($qry);
  if($num>0)
  {
  ?>
  <h3 align="center">Products</h3>
   <table width="90%" align="center">
				<thead>
				  <tr>
					<th class="card-primary">Sno</th>
					<th class="card-primary">Product</th>
					
				    <th class="card-primary">Rate</th>
				    <th class="card-primary">Supplier</th>
				    <th class="card-primary">Location</th>
				    <th class="card-primary">Supply Date</th>
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
					<td><?php echo $row['product']; ?></td>
					
					
				    <td><?php echo $row['price']; ?></td>
				    <td><?php echo $row['supplier']; ?></td>
				    <td><?php echo $row['slocation']; ?></td>
				    <td><?php echo $row['sdate']; ?></td>
				  </tr>
				  <?php

				  }
				  ?>
				</tbody>
</table>
	   <?php
	   }
	   ?>
  <p>&nbsp;</p>
</body>
</html>