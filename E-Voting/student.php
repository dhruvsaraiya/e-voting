<?php
try {
    include("connection.php");
	session_start();
    $id = $_POST['uid'];
    $pass = $_POST['pass'];
    $sql = "select id,branch from student where id = ? and password= ?";
    $query = $dbhandler->prepare($sql);
    $query->execute(array($id, $pass));
    $count = $query->rowcount();
    if ($count > 0) {
        while ($r = $query->fetch()) {
            $a = $r['id'];
            $_SESSION['uname'] = $id;
            $_SESSION['role'] = "student";
            $_SESSION['branch'] = $r['branch'];
            //echo "$a";
            header("location:student_welcome.php");
        }
    } else {
        header("location:login.php?k=1");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>