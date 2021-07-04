<?php
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		$user = $_GET["uid"];
		$receiver = $_GET["receive"];
		$post = $_GET["post"];
		$notif = $_GET["notifId"];
		$testsql = "SELECT * FROM `posted_foods` WHERE `postId` = '{$post}' AND `status` = 'Available'"; 
		$sql1 = "INSERT INTO `archived_post`(`postId`, `foodName`, `category`, `description`, `location`, `time_posted`, `date_archived`, `owner`, `receiver`, `status`) SELECT `postId`, `foodName`, `category`, `description`, `location`, `time_posted`, DATE_ADD(NOW(), INTERVAL 5 HOUR), `owner`, '{$receiver}', 'Claimed' from `posted_foods` where `owner` = '{$user}' AND `postId` = '{$post}'";
		$sql2 = "UPDATE `posted_foods` SET `receiver` = '{$receiver}', `status` = 'Claimed' WHERE `postId` = '{$post}' AND `owner` = '{$user}'";
		$sql3 = "INSERT INTO `confirmed_transac`(`owner`, `receiver`, `postId`, `notifId`, `timestamp`) VALUES ('{$user}', '{$receiver}', '{$post}', '{$notif}', DATE_ADD(NOW(), INTERVAL 5 HOUR))";
		$sql4 = "INSERT INTO `notifications`(`notifType`, `notifTo`, `notifFrom`, `postId`, `notifDate`, `transacId`) SELECT 'Request Accepted', '{$receiver}', '{$user}', '{$post}', `timestamp`, `transactId` from `confirmed_transac` WHERE `postId` = '{$post}'";
		$sql5 = "UPDATE `notifications` SET `transacId` = (SELECT `transactId` FROM `confirmed_transac` where `notifId` = '{$notif}') WHERE `notifId` = '{$notif}'";
		$testresult = $conn->query($testsql);
		if(!($testresult->num_rows === 0)){
			if ($conn->query($sql1) === TRUE) {
				if ($conn->query($sql2) === TRUE) {
					if($conn->query($sql3) === TRUE){
						if($conn->query($sql4) === TRUE){
							if($conn->query($sql5) === TRUE){
								echo json_encode("PostID: ".$post." of userID: ".$user." was given to ".$receiver);
							}
						}else{
							echo json_encode("Error4: " . $sql . "<br>" . $conn->error);
						}
					}else{
						echo json_encode("Error3: " . $sql . "<br>" . $conn->error);	
					}			
				}else{
					echo json_encode("Error2: " . $sql . "<br>" . $conn->error);
				}
			}else{
				echo json_encode("Error1: " . $sql . "<br>" . $conn->error);
			}
		}else{
			echo json_encode("ErrorTest: " . $sql . "<br>" . $conn->error."<br>The post might have been claimed/deleted or expired");	
		}
	}else{
		echo json_encode("You can't access the db!");
	}
	$conn->close();
?>

