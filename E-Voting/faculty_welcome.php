<?php
include("check_faculty.php");
?>


<!DOCTYPE html>
<html>
    <head>
    <img src="images\ddu.jpg" width=1350/>
    <style>
        * {box-sizing: border-box}
        body {font-family: "Lato", sans-serif;}

        /* Style the tab */
        div.tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 20%;
            height: 300px;
        }

        /* Style the links inside the tab */
        div.tab a {
            display: block;
            color: black;
            padding: 22px 16px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of links on hover */
        div.tab a:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        div.tab a:focus, .active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 0px 12px;
            border: 1px solid #ccc;
            width: 80%;
            border-left: none;
            height: 300px;
        }
    </style>
</head>
<body>
    <div class="tab">
        <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'about')" id="defaultOpen">Details</a> 
		<a href="new_subject.php" >Subjects</a>
		<a href="update_faculty.php">Update data</a>
        <a href="logout.php">LogOut</a>
    </div>

    <div id = "about" class = "tabcontent">
    <?php
    if (isset($_GET['k'])) {
        if ($_GET['k'] == 1) {
    echo "<script>alert('Success')</script>";
    } else if ($_GET['k'] == 2) {
    echo "<script>alert('Failure')</script>";
    } else if ($_GET['k'] == 3) {
    echo "<script>alert('Record Exists')</script>";
    }
    }

    $sql = "select * from faculty where f_id = '" . $_SESSION['uname'] . "'";
    try {
    include("connection.php");
    $query = $dbhandler->query($sql);
    while ($r = $query->fetch()) {
        $name = $r['name'];
        $branch = $r['branch'];
        }
    } catch (PDOException $e) {
    echo $e->getMessage();
    die();
    }
    $_SESSION['branch'] = $branch;
    echo "Welcome $name <br>Faculty Of $branch Department";
    ?>
</div>
<br><br>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

</body>
</html> 
