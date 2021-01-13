<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$q1=mysql_query("select * from sc_user where uname='$uname'");
$r1=mysql_fetch_array($q1);
$prkey=$r1['prkey'];	
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
    <style type="text/css">
<!--
.bg1 {	background-color: #FF6633;
}
-->
    </style>
</head>

<body>
  
 <div class="panel panel-default">
  <div class="t1" align="center"><span><?php include("include/title.php"); ?></span></div>
  <?php include("link_bcuser.php"); ?>
  <div class="panel-body">
   <h3 align="center">Block Chain </h3>
  </div>
</div>
 <!--start content area-->

<!--end content area-->
  <form id="form1" name="form1" method="post" action="">
    <table width="317" height="120" border="0" align="center">
      <tr>
        <td colspan="2" align="left" class="bg1">View Blocks </td>
      </tr>
      <tr>
        <td width="83" align="left">Private Key </td>
        <td width="224" align="left"><input type="password" name="prk" /></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left"><input type="submit" name="btn" value="Submit" /></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <?php
	if(isset($btn))
	{
		if($prkey==$prk)
		{
		$q3=mysql_query("select * from sc_blockchain where block_id=$pid order by id limit 0,1");
		$r3=mysql_fetch_array($q3);
		$ss=explode(",",$r3['sdata']);
		$ss1=explode(":",$ss[4]);
		$edate=$ss1[1];
		$cdate=date("Y-m-d");
		$dy=(strtotime($edate)-strtotime($cdate))/(60*60*24);
		
	$q2=mysql_query("select * from sc_blockchain where block_id=$pid order by id");
		
	?>
	<table width="80%" border="1" align="center">
      <tr>
        <td width="53" align="center" class="bg1">Sno</td>
        <td width="503" align="center" class="bg1">Details</td>
      </tr>
	  <?php
	  $i=0;
	  while($r2=mysql_fetch_array($q2))
	  {
	  $i++;
	  ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $r2['sdata']; ?></td>
      </tr>
	  <?php
	  }
	  ?>
    </table>
	<?php
			if($dy>0)
			{
			?><h4 style="color:#009933" align="center">This Product has not expired..</h4><?php
			}
			else
			{
			?><h4 style="color:#009933" align="center">This Product has expired!</h4><?php
			}
	
	
	}
	else
	{
	?><h4 style="color:#FF0000" align="center">Wrong Key!</h4><?php
	}
	
	}
	?>
    <p>&nbsp;</p>
  </form>
  <p align="center" class="msg">&nbsp;</p>
  <p>&nbsp;</p>
</body>
</html>