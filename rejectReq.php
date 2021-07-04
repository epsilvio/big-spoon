<?php
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		$user = $_GET["uid"];
		$receiver = $_GET["receive"];
		$post = $_GET["post"];
		$notif = $_GET["notifId"];
		$testsql = "SELECT * FROM `posted_foods` WHERE `postId` = '{$post}' AND `status` = 'Available'"; 
		$sql1 = "INSERT INTO `notifications`(`notifType`, `notifTo`, `notifFrom`, `postId`, `notifDate`, `response`) VALUES ('Request Rejected', '{$receiver}', '{$user}', '{$post}', DATE_ADD(NOW(), INTERVAL 5 HOUR), 'Rejected')";
		$sql2 = "UPDATE `notifications` SET `response` =  'Rejected' where `notifId` = '{$notif}'";
		$testresult = $conn->query($testsql);
		if(!($testresult->num_rows === 0)){
			if ($conn->query($sql1) === TRUE) {
				if($conn->query($sql2) === TRUE){
					echo json_encode("PostID: ".$post." of userID: ".$user." rejects the request of ".$receiver);
				}else{
					echo json_encode("Error2: " .$sql2. "<br>" . $conn->error);
				}
			}else{
				echo json_encode("Error1: " .$sql1. "<br>" . $conn->error);
			}
		}else{
			echo json_encode("ErrorTest: " .$testsql. "<br>" . $conn->error."<br>The post might have been claimed/deleted or expired");	
		}
	}else{
		echo json_encode("You can't access the db!");
	}
	$conn->close();
?>

