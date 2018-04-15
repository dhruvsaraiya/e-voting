<?php
try {
    include("connection.php");
	
            session_start();
    $id = $_POST['uid'];
    $pass = $_POST['pass'];
    $sql = "select name,branch from faculty where f_id = ? and password= ?";
    $query = $dbhandler->prepare($sql);
    $query->execute(array($id, $pass));
    $count = $query->rowcount();
    if ($count > 0) {
        while ($r = $query->fetch()) {
            $a = $r['name'];
            $_SESSION['uname'] = $id;
            $_SESSION['role'] = "faculty";
            $_SESSION['branch'] = $r['branch'];
            //echo "$a";
            header("location:faculty_welcome.php");
        }
    } else {
        header("location:login.php?k=1");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>