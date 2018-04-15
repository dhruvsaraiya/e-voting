<?php
	include("check_hod.php");
	include("connection.php");
	$branch = $_SESSION['branch'];
	$sql = "select votes,sub_id from subject where branch = '$branch' and compulsory='1'";
	$query = $dbhandler->query($sql);
	$sub = array("","");
	$votes = array(0,0);
	$i=0;
	while($r=$query->fetch()){
		$sub[$i] = $r['sub_id'];
		$votes[$i] = (int)$r['votes'];
		$i++;
	}
	$selected1 = "";
	if($votes[0] > $votes[1]){
		$selected1 = $sub[0];
	}
	elseif($votes[0] == $votes[1]){
		$sql = "select * from faculty where p1='".$sub[0]."'";
		$query = $dbhandler->query($sql);
		$c1 = $query->rowcount();
		$sql = "select * from faculty where p2='".$sub[1]."'";
		$query = $dbhandler->query($sql);
		$c2 = $query->rowcount();
		if($c1 > $c2){
			$selected1 = $sub[0];
		}else{
			$selected1 = $sub[1];
		}
	}
	else{
		$selected1 = $sub[1];
	}
	$sql = "update hod set selected_sub_id='$selected1' where branch='$branch' ";
	$query = $dbhandler->query($sql);
	
	$sql = "select votes,sub_id from subject where branch='$branch' and compulsory='2'";
	$query = $dbhandler->query($sql);
	$sub = array("","");
	$votes = array(0,0);
	$i=0;
	while($r=$query->fetch()){
		$sub[$i] = $r['sub_id'];
		$votes[$i] = (int)$r['votes'];
		$i++;
	}
	$selected2 = "";
	if($votes[0] > $votes[1]){
		$selected2 = $sub[0];
	}
	elseif($votes[0] == $votes[1]){
		$sql = "select * from faculty where p2='".$sub[0]."'";
		$query = $dbhandler->query($sql);
		$c1 = $query->rowcount();
		$sql = "select * from faculty where p2='".$sub[1]."'";
		$query = $dbhandler->query($sql);
		$c2 = $query->rowcount();
		if($c1 > $c2){
			$selected2 = $sub[0];
		}else{
			$selected2 = $sub[1];
		}
	}
	else{
		$selected2 = $sub[1];
	}
	$sql = "update hod set selected_sub_id2='$selected2' where branch = '$branch' ";
	$query = $dbhandler->query($sql);
	if($query->rowcount()==1){
		header("location:hod_welcome.php?k=1");		
	}else{
		header("location:hod_welcome.php?k=2");	
	}
?>