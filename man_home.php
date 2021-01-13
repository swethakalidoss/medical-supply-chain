<?php
session_start();
include("include/dbconnect.php");
include("encrypt_msg.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$q1=mysql_query("select * from sc_company where uname='$uname'");
$r1=mysql_fetch_array($q1);
$company=$r1['name'];
$pcode=$_SESSION['pcode'];

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
  
</div>
<?php include("link_man.php"); ?>
 <!--start content area-->
  <?php
if($_REQUEST['act']=="success")
{
?>
<div class="alert alert-success">
  <strong>New Product Added Success!</strong> 
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
                    <h2>Product Info</h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  <form name="name" method="post" enctype="multipart/form-data">
				  <div class="form-group">
                      <label>Product Code: </label>
                      <?php echo $pcode; ?>
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <select name="category" class="form-control">
					  <?php
					  $ctq=mysql_query("select * from sc_category");
					  while($ctr=mysql_fetch_array($ctq))
					  {
					  ?>
					  <option><?php echo $ctr['category']; ?></option>
					  <?php
					  }
					  ?>
					  </select>
                    </div>
					<div class="form-group">
                      <label>Product Name</label>
                      <input type="text" name="product" placeholder="Product Name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Product Rate</label>
                      <input type="text" name="price" placeholder="Product Rate" class="form-control">
                    </div>
               
					
                                                                                    <div class="form-group">
                      <label>Product Weight/Grams/Kg/Numbers</label>
                      <input type="text" name="psize" placeholder="Product Weight" class="form-control">
					  <select name="kg" class="form-control">
					  <option>Gram</option>
					  <option>Kilogram</option>
					  <option>Litre</option>
					  <option>Packet</option>
					  </select>
                    </div>
                   <div class="form-group">
                      <label>Product Description</label>
                      <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Manufacture Location</label>
                      <input type="text" name="location" placeholder="Manufacture Location" class="form-control">
                    </div>
					<div class="form-group">
                      <label>Manufacture Date</label>
                      <input type="date" name="mdate" placeholder="Manufacture Date" class="form-control">
                    </div>
                                                                                               
                     <div class="form-group">
                      <label>Expiry Date</label>
                      <input type="date" name="edate" placeholder="Expiry Date" class="form-control">
                    </div>
					
					<!--<div class="form-group">
                      <label>Product Photo</label>
                      <input type="file" name="file">
                    </div>-->
					
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
                                                      
			
	 $mq=mysql_query("select max(id) from sc_product");
	 $mr=mysql_fetch_array($mq);
	 $id=$mr['max(id)']+1;
	 
	 $rnd=rand(100,999);
	 $mon=date('m');
	 $yr=date('y');
	// $pcode=$yr.$mon.$rnd.$id;
	 
	 $mdd=explode("-",$mdate);
	 $edd=explode("-",$edate);
	 $mdate1=$mdd[2]."-".$mdd[1]."-".$mdd[0];
	 $edate1=$edd[2]."-".$edd[1]."-".$edd[0];
	 
	 /*if($_FILES['file']['name']!="")
	 {
	 $photo="P".$id.".jpg";
	 move_uploaded_file($_FILES['file']['tmp_name'],"product/".$photo);
	 }*/
	 
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
	 
	$data="$rdate,Company:$company,Manufacture:$mdate1,Expiry:$edate1,Location:$location";
	$hash=md5($data);
	
	
	#$hash=bin2hex(Encode($data,"xyz"));
	mysql_query("insert into sc_blockchain(id,block_id,pre_hash,hash_value,sdata) values($id2,'$id','$pre_hash','$hash','$data')");
	//////////////////////////////////////////////////////////////
	
	 $ins=mysql_query("insert into sc_product(id,category,product,company,price,psize,kg,description,location,mdate,edate,pcode,rdate) values($id,'$category','$product','$uname','$price','$psize','$kg','$description','$location','$mdate1','$edate1','$pcode','$rdate')");
        
		 ?>
		 <script language="javascript">
		 window.location.href="man_home.php?act=success";
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