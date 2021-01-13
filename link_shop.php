<div class="topnav" id="myTopnav">
  <a href="shop_home.php" class="active">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Sales
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
		<a href="shop_cus.php">Customers</a>
		<a href="shop_sales.php">Sales</a>
		<!--<a href="shop_return.php">Returned</a>-->
    </div>
  </div> 
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onClick="myFunction()">&#9776;</a>
</div>


<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>