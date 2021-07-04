<?php
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		$id = $_GET["id"];
		$sql = "SELECT * FROM `accounts` WHERE uid = '{$id}'";
		$result = $conn->query($sql);
		while($r = mysqli_fetch_assoc($result)) {
    			$rows = $r;
		}
		if(!is_null($rows)){	
			echo json_encode($rows, JSON_UNESCAPED_SLASHES);
		}else{
			echo "User doesn't exist!";
		}
	}else{
		echo "You can't access the db!";
	}
	$conn->close;
?>