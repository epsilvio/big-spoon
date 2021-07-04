<?php
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		$receiver = $_GET["receiver"];
		$giver = $_GET["giver"];
		$postId = $_GET["postId"];
		$response = $_GET["response"];
		$notifDate = $_GET["datetime"];
		$notifType = "Request";
		$testsql3 = "SELECT * FROM `posted_foods` where `status` = 'Available' AND `postId`= '{$postId}'";
		$testsql1 = "SELECT * FROM `food_requests` where `receiver` = '{$receiver}'";
		$testsql2 = "SELECT * FROM `food_requests` where `receiver` = '{$receiver}' AND `postId`= '{$postId}'";
		$notifsql = "INSERT INTO `notifications`(`notifType`, `notifTo`, `notifFrom`, `postId`, `notifDate`) VALUES('{$notifType}','{$giver}','{$receiver}','{$postId}','{$notifDate}')";
		$result1 = $conn->query($testsql1);
		$result2 = $conn->query($testsql2);
		$result3 = $conn->query($testsql3);
		if(!($result1->num_rows < 5)){
			echo "You have reached your limit of 5 requests per day!";
		}else{
			if($result2->num_rows === 0){
					if(!($result3->num_rows === 0)){
					$sql = "INSERT INTO `food_requests`(`receiver`, `owner`, `postId`, `response`) VALUES ('{$receiver}','{$giver}','{$postId}','{$response}')";
					if ($conn->query($sql) === TRUE) {
						if ($conn->query($notifsql) === TRUE) {
							echo "Your request has been successfully sent!";	
						} else {
							echo "Notif Error: " . $sql . "<br>" . $conn->error;
						}
					} else {
						echo "Request Error: " . $sql . "<br>" . $conn->error;
					}
				}else{
					echo "Sorry, that post has become unavailable";
				}
			}else{
				echo "You can only request once per post!";
			}
			
		}
	}else{
		echo "You cant access the db!";	
	}
	$conn->close();
?>