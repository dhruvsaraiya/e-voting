<?php
include("check_student.php");
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
        <a href="logout.php">LogOut</a>
    </div>

    <div id="about" class="tabcontent">
	<table cellspacing=25>
	<tr><td width=500>
        <?php
        include("connection.php");
		        if (isset($_GET['k'])) {
                    if ($_GET['k'] == 1) {
                        echo "<script>alert('You Have Already Voted!')</script>";
                    }
                    if ($_GET['k'] == 2) {
                        echo "<script>alert('Your Vote is Noted SuccessFully')</script>";
                    }
                    if ($_GET['k'] == 3) {
                        echo "<script>alert('Voting not allowed Now')</script>";
                    }
                }
		$branch = $_SESSION['branch'];
        $id = $_SESSION['uname'];
        $sql = "select * from student where id='" . $id . "'";
        $query = $dbhandler->query($sql);
        while ($r = $query->fetch()) {
            echo "<br><b>Id : </b>" . $id . "</br>";
            echo "<br><b>Name : </b>" . $r['name'] . "</br>";
            echo "<br><b>Year : </b>" . $r['year'] . "</br>";
            echo "<br><b>Mail Id : </b>" . $r['email'] . "</br>";
        }
        ?>
	</td>
	<td>
	<h3>
	<?php
		$sql = "select * from hod where branch = '$branch'";
		$query = $dbhandler->query($sql);
		$flag = 0;
		while($r=$query->fetch()){
			if($r['selected_sub_id'] != "" && $r['selected_sub_id2'] != ""){
				echo "First Selected Subject : <font color='blue'>" . $r['selected_sub_id'] . "</font><br><br>";
				echo "Second Selected Subject : <font color='blue'>" . $r['selected_sub_id2'] ."</font><br>";
			}
		}
	?>
	</h3>
	</td>
	</tr>


	
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
