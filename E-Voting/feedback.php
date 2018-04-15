<?php
$txt = "data.txt"; 
if (isset($_POST['Feedback'])) { // check if both fields are set
    $fh = fopen($txt, 'a'); 
    $txt1=$_POST['Feedback']; 
	fwrite($fh,$txt1); // Write information to the file
    fclose($fh); // Close the file
	header("location:index.php");
}
?>
