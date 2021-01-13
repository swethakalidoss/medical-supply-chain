<div class="topnav" id="myTopnav">
  <a href="man_prd.php" class="active">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Products
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
		<a href="man_cat.php">Category</a>
      <a href="man_viewprd.php">Stock</a>
      <a href="man_transview.php">Transfer</a>
	  <a href="man_supply.php">Supply</a>
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