<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		require("call_db.php");
		$user = $_GET["uid"];
		$sql = "SELECT * FROM `accounts` WHERE `uid` = '{$user}' AND `status` = 'Disabled'";
		$res = $conn->query($sql);
		if(!($res === FALSE)){
			if($res->num_rows === 0){
				echo "Active";
			}else{
				echo "Disabled";
			}
		}else{
			echo $conn->error;
		}
		$conn->close();
	}else{
		echo "You can't access the db!";
	}
?>