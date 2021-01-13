<?php
session_start();
include("include/dbconnect.php");
include("encrypt_msg.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];



//$q2=mysql_query("select * from sc_blockchain where id=1");
//$r2=mysql_fetch_array($q2);
//$ff=Encode(hex2bin($r2['hash_value']),"xyz");

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
  <div class="panel-body">
   <h3 align="center">Block Chain </h3>
  </div>
</div>

 <!--start content area-->
  <?php
if($_REQUEST['act']=="success")
{
?>
<div class="alert alert-success">
  <strong>New User Registered Success!</strong> 
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
                    <h2>User Info</h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  <form name="name" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>User Type</label>
                      <select name="utype" class="form-control">
					  <option>Manufacturer</option>
					  <option>Supplier</option>
					  <option>Retailer</option>
					  </select>
                    </div>
					<div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" placeholder="Name" class="form-control" required>
                    </div>
                    
					<div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" required>
                    </div>
               
					<div class="form-group">
                      <label>Mobile No.</label>
                      <input type="text" name="mobile" class="form-control" required>
                    </div>
                   <div class="form-group">
                      <label>E-mail</label>
                      <input type="email" name="email" class="form-control" required>
                    </div>
					
                    <div class="form-group">       
                      <input type="submit" name="btn" value="Submit" class="btn btn-primary">
                    </div>
					<a href="index.php">Home</a> | 
					<a href="login_user.php">Smart Contract</a>
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
                                                      
			
	 $mq=mysql_query("select max(id) from sc_user");
	 $mr=mysql_fetch_array($mq);
	 $id=$mr['max(id)']+1;
	 
	$uname="U".$id;
	$kk=md5($uname);
	
	$pbkey=substr($kk,0,8);
	$prkey=substr($kk,8,8);
	
	 $ins=mysql_query("insert into sc_user(id,utype,name,address,mobile,email,uname,pbkey,prkey,status,rdate) values($id,'$utype','$name','$address','$mobile','$email','$uname','$pbkey','$prkey','0','$rdate')");
        
		 ?>
		 <script language="javascript">
		 window.location.href="user_reg.php?act=success";
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