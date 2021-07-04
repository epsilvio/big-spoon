<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		require("call_db.php");
		$repId = $_GET["rId"];
		$sql = "UPDATE `user_reports` SET `status` = 'Resolved' WHERE `reportId` = '{$repId}'";
		$res = $conn->query($sql);
		$conn->close();
		if($res === TRUE){
			echo "Report successfully resolved!";
		}else{
			echo "There was an error resolving this report! Try refreshing the page.";
		}
	}else{
		echo "You can't access the db!";
	}
?>