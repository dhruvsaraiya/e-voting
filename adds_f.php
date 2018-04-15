<?php
	include("check_faculty.php");
	include("connection.php");
	$id = $_POST['sid'];
	$name = $_POST['sname'];
	$pass = $_POST['spass'];
	$branch = $_SESSION['branch'];
	$email = $_POST['se'];
	$year = $_POST['sy'];
	//if exists
        $sql = "select id from student";
	$query = $dbhandler->query($sql);
	while($r = $query->fetch()){
		if($id == $r['id']){
			header("location:faculty_welcome.php?k=3");
		}
	}
	$sql = "INSERT INTO student(id,name,password,branch,year,email) VALUES(?,?,?,?,?,?)";
	$query = $dbhandler->prepare($sql);
	$query->execute(array($id,$name,$pass,$branch,$year,$email));
	$count = $query->rowcount();
	if($count == 1){
		header("location:faculty_welcome.php?k=1");
	}else{
		header("location:faculty_welcome.php?k=2");
	}
?>