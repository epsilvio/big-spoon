<?php
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	if(isset($_GET["uid"])){
		$uid = $_GET['uid'];
		$sql = "SELECT * FROM `accounts` WHERE `uid` = '{$uid}'";
		$result = $conn->query($sql);
		if(!($result === FALSE)){
			if(!($result -> num_rows === 0)){
				$existing = "Exists";
			}else{
				$existing = "Nope";
			}
		}else{
			$existing = "Error: " . $sql . "<br>" . $conn->error;
		}
		echo json_encode($existing);
	}
	}else{
		echo "You can't access the db!";
	}
	$conn->close();	
?>
