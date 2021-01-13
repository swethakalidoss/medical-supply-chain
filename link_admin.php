<div class="topnav" id="myTopnav">
  <a href="admin.php" class="active">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Student
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add_dept.php">Department</a>
      <a href="add_subject.php">Subject</a>
	  <a href="add_student.php">New Student</a>
	  <a href="view_student.php">View Students</a>
	  <a href="add_result.php">Exam Result</a>
	  <a href="change_pass.php">Change Password</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Academis 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add_table.php">Timetable</a>
      <a href="add_att.php">Attendance</a>
	  <!--<a href="add_eva.php">Evaluation</a>-->
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