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
    <table width="537" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td colspan="2" valign="top" class="bg1">Search Your Product Details </td>
      </tr>
      <tr>
        <td width="218" valign="top"><img src="img/veri.jpg" width="196" height="190" /></td>
        <td width="299" valign="top"><table width="317" height="120" border="0">
            <tr>
              <td colspan="2" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td width="83" align="left">Product ID</td>
              <td width="224" align="left"><input type="text" name="pid" /></td>
            </tr>
            <tr>
              <td align="left">&nbsp;</td>
              <td align="left"><input type="submit" name="btn" value="Search" /></td>
            </tr>
        </table></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <?php
	if(isset($btn))
	{
	?>
	<table width="572" border="1" align="center">
      <tr>
        <td width="274">Product Details </td>
        <td width="282"><?php
		$q2=mysql_query("select * from sc_blockchain where block_id=$pid order by id limit 0,1");
		$r2=mysql_fetch_array($q2);
		$ss=explode(",",$r2['sdata']);
		echo $ss[0].", ",$ss[1].", ".$ss[2];
		?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><a href="view_block.php?pid=<?php echo $pid; ?>">View Blocks </a></td>
      </tr>
    </table>
	<?php
	}
	?>
    <p>&nbsp;</p>
  </form>
  <p align="center" class="msg">&nbsp;</p>
  <p>&nbsp;</p>
</body>
</html>