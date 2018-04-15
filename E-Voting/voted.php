<?php
try {
    include("check_student.php");
    include("connection.php");
    include("check_voted.php");
    $branch = $_SESSION['branch'];
    $s_id1 = $_POST['subject1'];
    $id = $_SESSION['uname'];
    $sql = "select votes from subject where branch='$branch' and sub_id='$s_id1'";
    $query = $dbhandler->query($sql);
    $vote = 0;
    while ($r = $query->fetch()) {
        $vote = (int) $r['votes'];
    }
    $vote = $vote + 1;
    $sql = "update subject set votes=$vote where branch='$branch' and sub_id='$s_id1'";
    $query = $dbhandler->query($sql);
    $c1 = $query->rowcount();


    $s_id2 = $_POST['subject2'];
    $sql = "select votes from subject where branch='$branch' and sub_id='$s_id2'";
    $query = $dbhandler->query($sql);
    $vote = 0;
    while ($r = $query->fetch()) {
        $vote = (int) $r['votes'];
    }
    $vote = $vote + 1;
    $sql = "update subject set votes=$vote where branch='$branch' and sub_id='$s_id2'";
    $query = $dbhandler->query($sql);
    $c2 = $query->rowcount();
    $sql = "update student set voted='1' where id='$id'";
    $query = $dbhandler->query($sql);
    if ($query->rowcount() == 1) {
        header("location:student_welcome.php?k=2");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>
