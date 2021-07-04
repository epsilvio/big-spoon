<?php
	function removeUnavailable($array, $key, $value){
		foreach($array as $subKey => $subArray){
			if($subArray[$key] == $value){
				unset($array[$subKey]);
			}
			if(($subArray["status"] == "Claimed" && $subArray["notifType"] == "Request") && (!($subArray["notifFrom"] == $subArray["receiver"]))){
				unset($array[$subKey]);
			}
		}
		$array = array_values($array); 
		return $array;
	}
	function removeRejectedRequest($array, $key1, $value1, $key2, $value2){
		foreach($array as $subKey => $subArray){
			if($subArray[$key1] == $value1){
				if($subArray[$key2] == $value2){
					unset($array[$subKey]);
				}
			}
		}
		$array = array_values($array); 
		return $array;
	}
	function removeRated($array, $key){
		foreach($array as $subKey => $subArray){
			if($subArray[$key] == "TRUE"){
				unset($array[$subKey]);
			}
		}
		$array = array_values($array); 
		return $array;
	}
	include("call_db.php");
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){    
		$user = $_GET["uid"];
		$sql1 = "SELECT * FROM `notifications` WHERE `notifTo` = '{$user}' ORDER BY `notifId` DESC";
		$rows1 = array();
		$rows2 = array();
		$rows3 = array();
		$result1 = $conn->query($sql1);
		while($r = mysqli_fetch_assoc($result1)) {
    			$rows1[] = $r;
		}
		for($a = 0; $a < sizeof($rows1); $a++){
			$sql2 = "SELECT `foodName`, `receiver`, `owner`, `status` FROM `posted_foods` WHERE postId = '{$rows1[$a]["postId"]}'";
			$result2 = $conn->query($sql2);
			while($r = mysqli_fetch_assoc($result2)) {
    				$rows2[] = $r;
			}
		}
		for($a = 0; $a < sizeof($rows1); $a++){
			$sql3 = "SELECT `fname`, `lname` FROM `accounts` WHERE uid = '{$rows1[$a]["notifFrom"]}'";
			$result3 = $conn->query($sql3);
			while($r = mysqli_fetch_assoc($result3)) {
    				$rows3[] = $r;
			}
		}
		for($a = 0; $a < sizeof($rows1); $a++){
			$query = "SELECT * FROM `user_ratings` WHERE `ratingFrom` = '{$user}' AND `transactId` = '{$rows1[$a]["transacId"]}'";
			$testRes = $conn->query($query);
			if($testRes->num_rows == 0){
				$rows1[$a]["rated"] = "FALSE";
			}else{
				$rows1[$a]["rated"] = "TRUE";
			}
			$rows1[$a]["foodName"] = $rows2[$a]["foodName"];
			$rows1[$a]["receiver"] = $rows2[$a]["receiver"];
			$rows1[$a]["owner"] = $rows2[$a]["owner"];
			$rows1[$a]["status"] = $rows2[$a]["status"];
			$rows1[$a]["notifSender"] = $rows3[$a]["fname"]." ".$rows3[$a]["lname"];
		}
		$finalData = removeUnavailable($rows1, "status", "Deleted");
		$finalData = removeRejectedRequest($finalData, "notifType", "Request", "response", "Rejected");
		$finalData = removeRated($finalData, "rated");
		echo json_encode($finalData);
	}else{
		echo json_encode("You can't access the db!");
	}
	$conn->close();
?>