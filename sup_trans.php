<?php
session_start();
include("include/dbconnect.php");
include("encrypt_msg.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$q11=mysql_query("select * from sc_supplier where uname='$uname'");
	 $r11=mysql_fetch_array($q11);
	 $mobile=$r11['mobile'];
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
  <div  class="t1" align="center"><span><?php include("include/title.php"); ?></span></div>
  
</div>
<?php include("link_sup.php"); ?>
 <!--start content area-->
  <?php
if($_REQUEST['act']=="success")
{
?>
<div class="alert alert-success">
  <strong>Supplied Success!</strong> 
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
                    <h2>Supply to Retailer</h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  <form name="name" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Retailer</label>
                      <select name="shop" class="form-control">
					  <?php
					  $spq=mysql_query("select * from sc_shop");
					  while($spr=mysql_fetch_array($spq))
					  {
					  ?>
					  <option><?php echo $spr['uname']; ?></option>
					  <?php
					  }
					  ?>
					  </select>
                    </div>
					
                    <div class="form-group">
                      <label>Retailer Location</label>
                      <input type="text" name="location" placeholder="Location" class="form-control">
                    </div>
					<div class="form-group">
                      <label>Date</label>
                      <input type="date" name="sdate" placeholder="Date" class="form-control">
                    </div>
                     <div class="form-group">
                      <label>Supply by</label>
                      <select name="ttype" class="form-control">
					  <option>Tata AC</option>
					  <option>Lorry</option>
					  <option>Train</option>
					  <option>Flight</option>
					  <option>Ship</option>
					  </select>
                    </div>
					<div class="form-group">
                      <label>Transport Details(Name,Number)</label>
                      <input type="text" name="transport" placeholder="Transport" class="form-control">
                    </div>
					
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
	$mdd=explode("-",$sdate);
	 $sdate1=$mdd[2]."-".$mdd[1]."-".$mdd[0];
	 
	 $q31=mysql_query("select * from sc_blockchain where block_id=$pid order by id limit 0,1");
	 $r31=mysql_fetch_array($q31);
	 $v1=explode(",",$r31['sdata']);
	 $v2=explode(":",$v1[3]);
	 $v3=$v2[1];
	 	$dy=(strtotime($v3)-strtotime($rdate))/(24*60*60);
		//echo $dy;
		if($dy>0)
		{
	 /////////////////////////////////////////////
	 $q3=mysql_query("select * from sc_blockchain order by id desc limit 0,1");
	 $r3=mysql_fetch_array($q3);
	 
	 $prid=$r3['id'];
	 if($prid=="")
	 {
	 $pre_hash="00000000000000000000000000000000";
	 }
	 else
	 {
	 $q4=mysql_query("select * from sc_blockchain where id=$prid");
	 $r4=mysql_fetch_array($q4);
	 $pre_hash=$r4['hash_value'];
	 }
	 
	 $mq2=mysql_query("select max(id) from sc_blockchain");
	 $mr2=mysql_fetch_array($mq2);
	 $id2=$mr2['max(id)']+1;
	 
	$data="$sdate1,Retailer:$shop,Supply from:$uname,Location:$location,Transport:$ttype-$transport";
	$hash=md5($data);
	
	
	#$hash=bin2hex(Encode($data,"xyz"));
	mysql_query("insert into sc_blockchain(id,block_id,pre_hash,hash_value,sdata) values($id2,'$pid','$pre_hash','$hash','$data')");
	//////////////////////////////////////////////////////////////
	 $ins=mysql_query("update sc_product set retailer='$shop',supplier='$uname',slocation='$location',sdate='$sdate1',ttype='$ttype',transport='$transport',status=3 where id=$pid");
        
		 ?>
		 <script language="javascript">
		 window.location.href="sup_trans.php?act=success";
		 </script>
		 <?php
	 	 }
	 else
	 {
	 $message="Product ID:$pid, This Product has already Expired";
	 echo '<iframe src="http://pay4sms.in/sendsms/?token=b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= NoTSMS&message='.$message.'&number=91'.$mobile.'" style="display:none"></iframe>';
	  ?>
		 <script language="javascript">
		alert("This Product has already Expired!!");
		 </script>
		 <?php
	 }
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