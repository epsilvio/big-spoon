<?php
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	$user = $_GET["uid"];
	$sql = "SELECT * FROM `accounts` WHERE `uid` = '{$user}'";
	$result = $conn->query($sql);
	while($r = mysqli_fetch_assoc($result)) {
    		$rows = $r;
	}	
	echo json_encode($rows);
	}else{
		echo json_encode("You can't access the db!");	
	};
	$conn->close();
?>