<?php
include("check_hod.php");
	if(isset($_POST['date'])){
		include("connection.php");
		$u = $_SESSION['uname'];
		$d = $_POST['date'];
		echo $_POST['date'];
		$sql = "update hod set voting_date='$d' where hod_id='$u'";
		$query = $dbhandler->query($sql);
		$_SESSION['date'] = $_POST['date'];
		if($query->rowcount() == 1){
			header("location:hod_welcome.php?k=1");
		}
	}
	else{
		header("location:hod_welcome.php?k=2");
	}
?>