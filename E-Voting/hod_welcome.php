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
            height: 400px;
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
            height: 400px;
        }
    </style>
</head>
<body>
    <div class="tab">
        <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'about')" id="defaultOpen">Details</a>
        <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'vote')" >Set Vote Date </a>
		<?php
			include("connection.php");
			$branch = $_SESSION['branch'];
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
			$sql = "select * from hod where branch = '$branch'";
			$query = $dbhandler->query($sql);
			$flag = 0;
			while($r=$query->fetch()){
				if($r['selected_sub_id'] == "" && $r['selected_sub_id2'] == ""){
					$flag = 1;
				}
			}
            if(($vm == $cm && $cd > $vd)&&($flag==1)){
				echo "<a href='result.php'>Declare Result</a>";
			}
		?>		
		
        <a href="update.php">Update data</a>
        <a href="logout.php">LogOut</a>
    </div>

    <div id="about" class="tabcontent">
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
        $sql = "select * from hod where hod_id = '" . $_SESSION['uname'] . "'";
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
        echo "Welcome $name sir<br>Head Of $branch Department";
        ?>
    </div>

    <div id="vote" class="tabcontent">
        <form action='start_voting.php' method='POST'>
            <h3>
                Set Voting Date : <input type='date' name='date' />
                <br><br><input type='submit' value="Set Date"/>
            </h3>
        </form>
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
