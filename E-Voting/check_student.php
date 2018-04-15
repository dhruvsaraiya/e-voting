<?php

session_start();
if (!isset($_SESSION['uname'])) {
    header("location:login.php?k=2");
} elseif ($_SESSION['role'] != "student") {
    header("location:logout.php");
}
?>