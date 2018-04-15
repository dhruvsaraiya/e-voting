<?php
	include("connection.php");
	include("check_voted.php");
?>
<html>
<head><title>SubjectDetails</title>
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 20%;
    height: 600px;
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
    height: 600px;
}
input[type=submit]{
	width:15em;
height:2.5em;
}
</style>

</head>
<img src="images\ddu.jpg" width=1350/>
<body>

<div class="tab">
<?php
try{
	include("connection.php");
	$image = "images\branch\\".$_SESSION['branch'].".jpg";
	$id = $_SESSION['uname'];
	$sql = "select * from student where id='".$id."'";
	$query = $dbhandler->query($sql);
	while($r = $query->fetch()){
		echo "<br><b>Id : </b>".$id."</br>";
		echo "<br><b>Name : </b>".$r['name']."</br>";
		echo "<br><b>Year : </b>".$r['year']."</br>";
		echo "<br><b>Mail Id : </b>".$r['email']."</br>";	
	}
echo "</div>
<div class='tabcontent'>
<table cellspacing='50'>
<tr><td>
<form action='voted.php' method='post'>
<h3><b>Fixed subject for your stream...</b></h3>";
	$branch=$_SESSION['branch'];
	$sql = "select name,sub_id from subject where branch='$branch' and compulsory='0'";
	$query = $dbhandler->query($sql);
	echo "<h4><font color='gray'>";
	echo "<ol>";
	while($r=$query->fetch()){
		echo "<li>&nbsp;&nbsp;".$r['name']."<br>";		
	}
	
	echo "</ol></font></h4>";
	$sql = "select name,sub_id from subject where branch='$branch' and compulsory='1'";
	$query = $dbhandler->query($sql);
	echo "<h3><b>1st Elective subject</b></h3>";
	echo "<h4><font color='green'>";
	while($r=$query->fetch()){
		echo "<input type='radio' name='subject1' value=$r[sub_id] required/>";
		echo "$r[name]<br>";		
	}
	echo "</font></h4>";
	$sql = "select name,sub_id from subject where branch='$branch'and compulsory='2'";
	$query = $dbhandler->query($sql);
	echo "<h3><b>2nd Elective subject</b></h3>";
	echo "<h4><font color='green'>";
	while($r=$query->fetch()){
		echo "<input type='radio' name='subject2' value=$r[sub_id] required/>";
		echo "$r[name]<br>";		
	}
	echo "</font></h4>";
}catch(PDOException $e){
	echo $e->getMessage();
	die();
}
echo "</td><td>";
echo "<img src='".$image."' border='3' height='350' width='500'/>";
?>
<tr><td><input type="submit" value="Submit" /></td></tr>
</table>
</form>
</div>
</body>
</html>


