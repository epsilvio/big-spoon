<?php
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    		$uid = $_GET["uid"];
    		$fname = $_GET["fName"];
    		$lname = $_GET["lName"];
    		$cnum = $_GET["cNum"];
    		$photo = $_GET["photo"];
		$testsql = "SELECT * FROM `accounts` WHERE `uid` = '{$uid}' AND `last_update` <= DATE_ADD(current_date(), INTERVAL -1 MONTH)";
		$testRes = $conn->query($testsql);
		if(!($testRes->num_rows === 0)){
			$sql = "UPDATE `accounts` SET `fname` = '{$fname}', `lname` = '{$lname}', `cnum` = '{$cnum}', `photo_url` = '{$photo}', `last_update` = CAST(current_date() AS DATE) WHERE `uid` = '{$uid}'";
			if ($conn->query($sql) === TRUE) {
				echo "You have successfully updated your account!";
			} else {
				echo "There was an error updating your account, try again later. ".$conn->error;
			}
		}else{
			echo "Sorry, you can only update your account details once a month!";
		}
	}else{
		echo "You can't access the db!";
	}
	$conn->close();
?>