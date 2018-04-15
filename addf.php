<?php
include("check_hod.php");
include("connection.php");
$id = $_POST['fid'];
$name = $_POST['fname'];
$pass = $_POST['fpass'];
$branch = $_SESSION['branch'];
$sql = "select f_id from faculty";
$query = $dbhandler->query($sql);
while ($r = $query->fetch()) {
    if ($id == $r['f_id']) {
        header("location:hod_welcome.php?k=3");
    }
}
$sql = "insert into faculty(name,f_id,password,branch) values(?,?,?,?)";
$query = $dbhandler->prepare($sql);
$query->execute(array($name, $id, $pass, $branch));
$count = $query->rowcount();
if ($count == 1) {
    header("location:hod_welcome.php?k=1");
} else {
    header("location:hod_welcome.php?k=2");
}
?>