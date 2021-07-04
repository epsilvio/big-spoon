<?php
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){    
		$to = $_GET["to"];
		$from = $_GET["from"];
		$transact = $_GET["transact"];
		$stars = $_GET["stars"];
		$comment = $_GET["comment"];
		$testsql = "SELECT * FROM `user_ratings` WHERE `transactId` = '{$transact}' AND `ratingFrom` = '{$from}'";
		$testrow = $conn->query($testsql);
		$ratesql = "SELECT `stars` FROM `user_ratings` WHERE `ratingTo` = '{$to}'";
		$mainsql = "INSERT INTO `user_ratings`(`stars`, `comment`, `ratingTo`, `ratingFrom`, `timestamp`, `transactId`) VALUES('{$stars}','{$comment}','{$to}','{$from}', NOW(),'{$transact}')";
		$mainsql2 = "UPDATE `accounts` SET `user_rating` = (SELECT AVG(`stars`) FROM `user_ratings` WHERE `ratingTo` = '{$to}') WHERE `uid` = '{$to}'";
		$rating  = $conn->query($ratesql);
		if($testrow->num_rows === 0){
			if(!($rating === FALSE)){		
				if($conn->query($mainsql) === TRUE){
					if($conn->query($mainsql2) === TRUE){
						echo json_encode("Rating Submitted Successfully");
					}else{
						echo json_encode("Error with updating ratings");
					}
				}else{
					echo json_encode("Error: ".$conn->error);
				}
			}else{
				echo json_encode("Error getting rating: ". $conn->error);
			}
		}else{
			echo json_encode("You can only give one feedback per transaction!");
		}
	}else{
		echo json_encode("You can't access the db!");
	}
	$conn->close();
?>

