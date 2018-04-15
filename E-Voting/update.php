<?php
include("check_hod.php");
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
            height: 500px;
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
            height: 500px;
        }

    </style>
</head>
<body>
    <div class="tab">
        <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'addf')" id="defaultOpen">Add Faculty</a>
        <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'remf')">Remove Faculty</a>
        <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'adds')">Add Student</a>
        <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'rems')">Remove Student</a>
        <a href="logout.php">LogOut</a>
    </div>

    <div id="addf" class="tabcontent">
        <form action="addf.php" method="post">
            <table>
                <tr><td><b>Faculty Name(Full) </b></td>&nbsp;&nbsp;<td><input type="text" name="fname" required /></td></tr>
                <tr><td><b>Faculty Id </b></td>&nbsp;&nbsp;<td><input type="text" name="fid" required /></td></tr>
                <tr><td><b>Faculty Password </b></td>&nbsp;&nbsp;<td><input type="password" name="fpass" required /></td></tr>
                <tr><td colspan=2 align="center"><input type="submit" value="Add"/></td>
            </table>
        </form>
    </div>

    <div id="remf" class="tabcontent">
        <form action="remf.php" method="post">
            <table>
                <tr><td><b>Faculty Id Which is To Be Removed</b></td>&nbsp;&nbsp;<td><input type="text" name="fid" required /></td></tr>
                <tr><td colspan=2 align="center"><input type="submit" value="Remove"/></td>
            </table>
        </form>
    </div>

    <div id="adds" class="tabcontent">
        <form action="adds.php" method="post">
            <table>
                <tr><td><b>Student Name</b></td>&nbsp;&nbsp;<td><input type="text" name="sname" required /></td></tr>
                <tr><td><b>Student Id </b></td>&nbsp;&nbsp;<td><input type="text" name="sid" required /></td></tr>
                <tr><td><b>Student Password(BirthDay) </b></td>&nbsp;&nbsp;<td><input type="password" name="spass" required /></td></tr>
                <tr><td><b>Student Year </b></td>&nbsp;&nbsp;<td><input type="text" name="sy" required /></td></tr>
                <tr><td><b>Student Email </b></td>&nbsp;&nbsp;<td><input type="text" name="se" required /></td></tr>
                <tr><td colspan=2 align="center"><input type="submit" value="Add"/></td>
            </table>
        </form>
    </div>

    <div id="rems" class="tabcontent">
        <form action="rems.php" method="post">
            <table>
                <tr><td><b>Student Id Which is To Be Removed</b></td>&nbsp;&nbsp;<td><input type="text" name="sid" required /></td></tr>
                <tr><td colspan=2 align="center"><input type="submit" value="Remove"/></td>
            </table>
        </form>
    </div>
</script>

</body>
</html>
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

