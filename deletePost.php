<?php
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	$user = $_GET["uid"];
	$post = $_GET["post"];
	$sql1 = "INSERT INTO `archived_post`(`postId`, `foodName`, `category`, `description`, `location`, `time_posted`, `date_archived`, `owner`, `status`) SELECT `postId`, `foodName`, `category`, `description`, `location`, `time_posted`, DATE_ADD(NOW(), INTERVAL 5 HOUR), `owner`, 'Deleted' from `posted_foods` where `owner` = '{$user}' AND `postId` = '{$post}'";
	$sql2 = "UPDATE `posted_foods` SET `status` = 'Deleted' WHERE `postId` = '{$post}' AND `owner` = '{$user}'";
	if ($conn->query($sql1) === TRUE) {
		if ($conn->query($sql2) === TRUE) {
			echo json_encode("PostID: ".$post." of userID: ".$user." was moved from active posts to archive");
		} else {
			echo json_encode("Error2: " . $sql . "<br>" . $conn->error);
		}
	} else {
		echo json_encode("Error1: " . $sql . "<br>" . $conn->error);
	}
	}else{
		echo "You can't access the db!";
	}
	$conn->close();		
?>
