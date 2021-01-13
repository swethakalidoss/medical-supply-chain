<?php
session_start();
include("include/dbconnect.php");
include("email.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];

if($act=="yes")
{
$q1=mysql_query("select * from sc_user where id=$uid");
$r1=mysql_fetch_array($q1);
$email=$r1['email'];
$uu=$r1['uname'];
$pb=$r1['pbkey'];
$pr=$r1['prkey'];

 $objEmail	=	new CI_Email();
					$objEmail->from('security@gmail.com', "Key Info");
					$objEmail->to("$email");
					$objEmail->subject("User Confirmation");
					$objEmail->message("User ID:$uu, Public Key:$pb, Private Key:$pr");
						
							if ($objEmail->send())
							{	
							//echo 'mail sent successfully';
							}
							else
							{
							//echo 'not sent';
							}
							
mysql_query("update sc_user set status=1 where id=$uid");
?>
<script language="javascript">
window.location.href="view_user.php";
</script>
<?php
}
if($act=="no")
{
mysql_query("update sc_user set status=0 where id=$uid");
?>
<script language="javascript">
window.location.href="view_user.php";
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
<?php include("link_bc.php"); ?>
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

<h3 align="center">Smart Contract Users </h3>

  
  <p>
    <?php
  


  $qry=mysql_query("select * from sc_user");
  $num=mysql_num_rows($qry);
  if($num>0)
  {
  ?>
</p>
  <table width="90%" align="center">
    <thead>
      <tr>
        <th width="5%" align="center" class="card-primary">Sno</th>
        <th width="9%" align="center" class="card-primary">User ID </th>
        <th width="13%" align="center" class="card-primary">Name</th>
        <th width="13%" align="center" class="card-primary">User Type </th>
        <th width="15%" align="center" class="card-primary">Mobile. No. </th>
        <th width="12%" align="center" class="card-primary">E-mail</th>
        <th width="21%" align="center" class="card-primary">Address</th>
        <th width="12%" align="center" class="card-primary">Action</th>
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
        <td><?php echo $row['uname']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['utype']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php 
		if($row['status']=="0")
		{
		echo '<a href="view_user.php?act=yes&uid='.$row['id'].'">Accept</a>'; 
		}
		else
		{
		echo "Accepted /";
		echo '<a href="view_user.php?act=no&uid='.$row['id'].'">Reject</a>'; 
		}
		?></td>
      </tr>
      <?php

				  }
				  ?>
    </tbody>
  </table>
  <?php
	   }
	   ?>
</body>
</html>