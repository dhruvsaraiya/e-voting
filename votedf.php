<?php
try {
    include("check_faculty.php");
    include("connection.php");
    include("check_votedf.php");
    $branch = $_SESSION['branch'];
    $s_id1 = $_POST['subject1'];
	$s_id2 = $_POST['subject2'];
    $id = $_SESSION['uname'];
    $sql = "update faculty set preffered='1',p1='$s_id1',p2 ='$s_id2' where f_id='$id'";
	$query = $dbhandler->query($sql);
	$count = $query->rowcount();
	if($count==1){
		header("location:faculty_welcome.php?k=1");
	}else{
		header("location:faculty_welcome.php?k=2");
	}
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>
