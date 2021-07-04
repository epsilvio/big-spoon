<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		require("call_db.php");
		$sql = "SELECT `username` FROM `user_admins`";
		$res = $conn->query($sql);
		$row = Array();
		if(!($res === FALSE)){
			while($r = mysqli_fetch_assoc($res)) {
    				$row[] = $r;
			}
			echo json_encode($row);
		}else{
			echo json_encode("Error!");
		}
		$conn->close();
	}else{
		echo json_encode("Denied");
	}
?>