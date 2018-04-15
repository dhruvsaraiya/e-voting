


<!DOCTYPE html>
<html>
<head>
<img src="images\ddu.jpg" width=1350/>
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 20%;
    height: 300px;
}

/* Style the links inside the tab */
div.tab a {
    display: block;
    color: black;
    padding: 22px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
div.tab a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab a:focus, .active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 80%;
    border-left: none;
    height: 300px;
}
</style>
</head>
<body>
<h3> Login As: </h3>
<div class="tab">
  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Student')" id="defaultOpen">Student</a>
  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Faculty')">Faculty</a>
  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'HOD')">HOD</a>
  <a href="index.php">Back to Home</a>
  </div>
<?php 
	if(isset($_GET['k'])){
		if($_GET['k']==1){
			echo "<script>alert('Invalid Credentials')</script>";
		}
			
		if($_GET['k']==2){
			echo "<script>alert('Login First')</script>";
		}
		if($_GET['k']==3){
			echo "<script>alert('Logged Out Successfully')</script>";
		}
	}
?>
<div id="Student" class="tabcontent">
<form action="student.php" method="post">
<table>
<tr><td><b>Student Id</b></td>&nbsp;&nbsp;<td><input type="text" name="uid" required /></td></tr>
<tr><td><b>Password</b></td>&nbsp;&nbsp;<td><input type="password" name="pass" required /></td></tr>
<tr><td colspan=2 align="center"><input type="submit" name="Submit" value="Submit" /></td>
</table>
</form>
</div>

<div id="Faculty" class="tabcontent">
<form action="faculty.php" method="post">
<table>
<tr><td><b>Faculty Id</b></td>&nbsp;&nbsp;<td><input type="text" name="uid" required /></td></tr>
<tr><td><b>Password</b></td>&nbsp;&nbsp;<td><input type="password" name="pass" required /></td></tr>
<tr><td colspan=2 align="center"><input type="submit" name="Submit" value="Submit" /></td>
</table>
</form>
</div>

<div id="HOD" class="tabcontent">
<form action="hod.php" method="post">
<table>
<tr><td><b>HOD Id</b></td>&nbsp;&nbsp;<td><input type="text" name="uid" required /></td></tr>
<tr><td><b>Password</b></td>&nbsp;&nbsp;<td><input type="password" name="pass" required /></td></tr>
<tr><td colspan=2 align="center"><input type="submit" name="Submit" value="Submit" /></td>
</table>
</form>
</div>

<br><br>


<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 
