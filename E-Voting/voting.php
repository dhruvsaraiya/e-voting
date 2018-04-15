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
input[type=submit]{
	width:15em;
height:2.5em;
}
</style>

</head>
<img src="images\ddu.jpg" width=1350/>
<body>
<form action="voting.html" method="post">
<div class="tab"><center>
<img src="images\image.jpg" border="3" height=100 width=150/></center>
</div>
<div class="tabcontent">
<form action="mail.php" method="post">
<table>
<tr><td><h3>Fixed subject for your stream...</h3></td></tr>
<tr><td><h4> 1. Java Technology <br> 2. Maths-4 <br> 3. Data Algorithms & Analysis <br> 4. Computer System Architecture </td></tr>
<tr><td><h3> Selection 1 <br> <input type="radio" name="sel1" value="DM"> Discrete Mathematics <br> <input type="radio" name="sel1" value="CPI">
 Computer Peripheral Interface<br></td></tr>
<tr><td><h3> Selection 2 <br> <input type="radio" name="sel2" value="Yoga"> Yoga <br> <input type="radio" name="sel2" value="CS">
 Communication Skills<br></td></tr>
<tr><td><input type="submit" value="Submit" /></td></tr>
</div>
</table>
</form>
</body>
</html>



</form>
</body>
</html>

