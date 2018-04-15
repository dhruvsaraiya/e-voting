<?php
	include("check_faculty.php");
	include("connection.php");
	$id = $_POST['sid'];
	$sql = "delete from student where id = ?";
	$query = $dbhandler->prepare($sql);
	$query->execute(array($id));
	$count = $query->rowcount();
	if($count == 1){
		header("location:faculty_welcome.php?k=1");
	}else{
		header("location:faculty_welcome.php?k=2");
	}
?>