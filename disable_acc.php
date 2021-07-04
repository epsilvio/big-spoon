<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		require("call_db.php");
		$uid = $_GET["uid"];
		$sql = "UPDATE `accounts` SET `status` = 'Disabled' where `uid` = '{$uid}'";
		$res = $conn->query($sql);
		if($res === TRUE){
			echo "Account successfully disabled";
		}else{
			echo "There was an error disabling this account";
		}
		$conn->close();
	}else{
		echo "You can't access the db!";
	}
?>