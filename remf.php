<?php
	include("check_hod.php");
	include("connection.php");
	$id = $_POST['fid'];
	$sql = "delete from faculty where f_id = ?";
	$query = $dbhandler->prepare($sql);
	$query->execute(array($id));
	$count = $query->rowcount();
	if($count == 1){
		header("location:hod_welcome.php?k=1");
	}else{
		header("location:hod_welcome.php?k=2");
	}
?>