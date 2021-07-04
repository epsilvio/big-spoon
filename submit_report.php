<?php
	require("call_db.php");
	if(!empty($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
		$info = $_POST["info"];
		$testsql = "SELECT * FROM `accounts` where `uid` = '{$info["to"]}' OR `uid` = '{$info["from"]}'";
		$resultTest = $conn->query($testsql);
		if($resultTest->num_rows === 2){
			$sql = "INSERT INTO `user_reports`(`reportType`,`comment`,`reportTo`,`reportFrom`,`timestamp`) VALUES('{$info["repType"]}','{$info["comm"]}','{$info["to"]}','{$info["from"]}', NOW())";
			if($conn->query($sql) === TRUE){
				echo "Report Submitted. Thanks for trying to make the Big Spoon Community Better!";
			}else{
				echo "There was a problem submitting your report, please try again later.";
			}
		}else{
			echo "You cannot report a non-existing account!";
		}
	}else{
		echo "You can't access the db!";
	}
	$conn->close();
?>