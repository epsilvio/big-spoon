<?php
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	$user = $_GET["uid"];
	$sql = "SELECT * FROM `posted_foods` WHERE `status` = 'Available' AND `owner` = '{$user}' ORDER BY `postId` DESC";
	$result = $conn->query($sql);
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
	}	
	echo json_encode($rows);
	}else{
		echo "You can't access the db!";
	}
	$conn->close();
?>