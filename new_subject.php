<?php
include("check.php");
?>
<html>
    <head><title>SubjectDetails</title>
        <style>
            * {box-sizing: border-box}
            body {font-family: "Lato", sans-serif;}

            /* Style the tab */
            div.tab {
                float: left;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
                width: 20%;
                height: 900px;
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
                height: 600px;
            }
            input[type=submit]{
                width:15em;
                height:2.5em;
            }
        </style>

    </head>
    <img src="images\ddu.jpg" width=1350/>
    <body>
	<?php
		if($_SESSION['role']=="student"){
			echo "<form action='new_voting.php' method='post'>";
		}elseif($_SESSION['role']=="faculty"){
			echo "<form action='new_votingf.php' method='post'>";
		}
            
            try {
                include("connection.php");
                $branch = $_SESSION['branch'];
                $sql = "select name,sub_id,compulsory from subject where branch='$branch'";
                $query = $dbhandler->query($sql);
                $i = 0;
                echo "<div class='tab'>";
                $ac = 1;
				$arr = array("Fixed","1st Elective","2nd Elective");
                while ($r = $query->fetch()) {
                    $index = $r['compulsory'];
					$show = $arr[$index];
					if ($ac == 1) {
                        echo "<a href='javascript:void(0)' class='tablinks active' id='link_" . $r['sub_id'] . "' onclick=\"showDiv('$r[sub_id]')\">$r[name]<br><font color='blue'>$show</font></a>";
                    } else {
                        echo "<a href='javascript:void(0)' class='tablinks' id='link_" . $r['sub_id'] . "' onclick=\"showDiv('$r[sub_id]')\">$r[name]<br><font color='blue'>$show</font></a>";
                    }
                    $ac++;
                }
                echo "<br><br>";
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
                    echo "<center><input type='submit' value='Vote'/><br>Click Here for Voting</center>";
                } elseif ($cd > $vd) {
                    echo "<h4>Voting is Closed</h4>";
                } else {
                    echo "<h4>Voting will start soon</h4>";
                }
                echo "</div>";
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            ?>
            <?php
            try {
                include("connection.php");
                $branch = $_SESSION['branch'];
                $sql = "select name,sub_id from subject where branch='$branch'";
                $query = $dbhandler->query($sql);
                $i = 1;
                while ($r = $query->fetch()) {
                    $var = "<div id='" . $r['sub_id'] . "' class='tabcontent'";

                    if ($i == 1) {
                        $var .= "style='display:block'>";
                    } else {
                        $var .= "style='display:none'>";
                    }

                    $var .= "<h3>" . $r["name"] . "</h3>";
                    $image = "images\subject\\" . $branch . "\\" . $r['sub_id'] . ".jpg";
                    $var .= "<image src=" . $image . " alter='No Information about Subject'/>";


                    $var .= "</div>";
                    echo $var;
                    $i++;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            ?>
            <script>
                function showDiv(gid)
                {
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    document.getElementById("link_" + gid).className = "tablinks active";
                    document.getElementById(gid).style = "display:block";

                }
            </script>
        </form>


    </body>
</html>