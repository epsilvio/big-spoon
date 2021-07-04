<?php
	require("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		$id = $_GET["id"];
		$sql = "SELECT * FROM `user_ratings` WHERE NOT `comment` = '' AND `ratingTo` = '{$id}'";
		$result = $conn->query($sql);
		$rows = Array();
		$from = Array();
		if(!($result->num_rows === 0)){
			while($r = mysqli_fetch_assoc($result)) {
    				$rows[] = $r;
			}
			for($a = 0; $a < sizeof($rows); $a++){
				$sql2 = "SELECT `fname`, `lname` FROM `accounts` WHERE `uid` = '{$rows[$a]["ratingFrom"]}'";
				$result2 = $conn->query($sql2);
				while($r = mysqli_fetch_assoc($result2)) {
    					$from[] = $r;
				}
			}
			for($a = 0; $a < sizeof($rows); $a++){
				$rows[$a]["fromName"] = $from[$a]["fname"]." ".$from[$a]["lname"];
			}
			echo json_encode($rows);
		}else{
			echo "User not existing!";
		}
	}else{
		echo "You can't access the db!";
	}
	$conn->close();
?>