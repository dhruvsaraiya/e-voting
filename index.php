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
            height: 600px;
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

    </style>
</head>
<body>
    <div class="tab">
        <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'About')" id="defaultOpen">About </a>
        <a href="login.php" >Login As </a>
        <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'FAQ')">FAQs</a>
        <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Feedback')">Feedback</a>
		<a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Developers')">Contact Us</a>
    </div>

    <div id="About" class="tabcontent">
        <h3>About this page ...</h3>


        <!DOCTYPE html>
        <html>
            <title>DDU</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
            <style>
                .mySlides {display:none;}
            </style>
            <body>

                <div class="w3-content w3-section" style="max-width:500px">
                    <?php
                    for ($i = 1; $i <= 6; $i++) {
                        $image = 'images\ddu' . $i . '.jpg';
                        echo "<img class='mySlides' src='$image' height='400' width='850'>";
                    }
                    ?>
                </div>

                <script>
                    var myIndex = 0;
                    carousel();

                    function carousel() {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        myIndex++;
                        if (myIndex > x.length) {
                            myIndex = 1
                        }
                        x[myIndex - 1].style.display = "block";
                        setTimeout(carousel, 4000); // Change image every 4 seconds
                    }
                </script>

            </body>
        </html>
        <br><br>
        <tr><td>This is site of "Voting for subject Selection"<br>
                Only Students ,Faculties & HODs of DDU(All Department) can login.</td>

            </table>
    </div>
	<div id="FAQ" class="tabcontent">
		<b>Q.How can I get myself registered?</b><br>
		<b>Ans</b>You are already registered if you are DDU collage student.<br><br>
		<b>Q.What is my login ID?</b><br>
		<b>Ans</b>Your login ID is your ID given to you.<br><br>
		<b>Q.What is my password?</b><br>
		<b>Ans</b>If You are a student,Password is your birthdate.<br><br>
		<b>Q.How and When can I vote?</b><br>
		<b>Ans</b>Votes can only be submitted and counted while the voting period is open.During the voting period you can see the name of subjects on the voting page of the website,and you will be prompted to click on the subjects for whom you want to vote.<br><br>
		<b>Q.How can I see what is in subject course?</b><br>
		<b>Ans</b>When you are logged in then just click on subject,image of each subject course will be displayed <br><br>
		<b>Q.Which subject I have to vote and which subject is already fixed?</b><br>
		<b>Ans</b>I all subject cloumn you will see the fixed subject written fixed below it and 
		         if fixed is not written then that subjects you have to vote.<br><br>
		<b>Q.I am having trouble voting	online-why?</b><br>
		<b>Ans</b>Although the Internet can	handle huge	volumes	of vote	submissions	simultaneously,	
		          there may be times when your local service provider may not be able to handle every attempt	
				  due to the sheer volume.Other technical issues may also arise, such as errors in vote transmission,service	
				  outages,delays,malfunctions of telecommunications equipment,software glitches,etc.If you	
				  are trying to vote during the Voting Period but find that your attempts to vote are not being
				  processed,please be patient and try again	later.<br><br>
	    <b>Q.What if I have given vote to the wrong subject and If I want to change it latter?</b><br>
		<b>Ans</b>Once you have given vote to subject then it will be not change latter time so make sure which 
		          subject you want to give vote.<br><br>
	</div>
	<div id="Developers" class="tabcontent">
	<h3>
		<br><br>
			Dhruv Saraiya : <font color="blue">dhruvsaraiya30@gmail.com<br><br></font>
			Jay Rajvadiya : <font color="blue">jrajvadiya@gmail.com<br><br></font>
			Pranay Shah &nbsp;  : <font color="blue">shahpranay93@gmail.com<br><br></font>
		
	</h3>
	</div>

    <div id="Feedback" class="tabcontent">
        <form action="feedback.php" method="post">
            <h3>we are happy to have your Feedback .....</h3>
            <textarea name="Feedback" rows="15" cols="80"></textarea><br>
            <input type="submit" name="Submit"/>
        </form>
    </div>

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

