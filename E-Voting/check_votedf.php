<?php
include("check_faculty.php");
include("connection.php");
$id = $_SESSION['uname'];
$branch = $_SESSION['branch'];
$sql = "select f_id from faculty where f_id='$id' and preffered='1'";
$query = $dbhandler->query($sql);
if ($query->rowcount() == 1) {
    header("location:new_subject.php?k=1");
}
$currentDate = date('d-m-Y');
$votingdate = "";
$sql = "select voting_date from hod where branch='$branch'";
$query = $dbhandler->query($sql);
while ($r = $query->fetch()) {
    $votingDate = $r['voting_date'];
}
$cd = substr($currentDate, 0, 2);
$vd = substr($votingDate, 8, 2);
$cm = substr($currentDate, 3, 2);
$vm = substr($votingDate, 5, 2);
if ($cd >= $vd && $cm == $vm && $cd <= ($vd + 2)) {
    
} else {
    header("location:new_subject.php?k=3");
}
?>
