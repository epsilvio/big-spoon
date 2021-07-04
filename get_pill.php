<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		require("call_db.php");
		$admin = $_GET["admin"];
		$pills = Array();
		$testsql = "SELECT * FROM `user_admins` WHERE `username` = '{$admin}'";
		$sql1 = "SELECT * FROM `user_reports` WHERE `status` =  'Waiting'";
		$sql2 = "SELECT * FROM `posted_foods` WHERE `status` =  'Available'";
		$sql3 = "SELECT * FROM `accounts` WHERE `status` =  'Active'";
		$res1 = $conn->query($sql1);
		$res2 = $conn->query($sql2);
		$res3 = $conn->query($sql3);
		$testRes = $conn->query($testsql);
		if($testRes->num_rows === 1){
			if(!($res1 === FALSE)){
				while($r = mysqli_fetch_assoc($res1)) {
    					$pills["reports"][] = $r;
				}
				$pills["reports"]["reportCt"] = $res1->num_rows;
				if(!($res2 === FALSE)){
					while($r = mysqli_fetch_assoc($res2)) {
    						$pills["posts"][] = $r;
					}
					$pills["posts"]["postCt"] = $res2->num_rows;
					if(!($res3 === FALSE)){
						while($r = mysqli_fetch_assoc($res3)) {
    							$pills["accounts"][] = $r;
						}
						$pills["accounts"]["accCt"] = $res3->num_rows;
						echo json_encode($pills);	
					}else{
						echo json_encode("Error Getting Accounts");
					}
				}else{
					echo json_encode("Error Getting Posts");
				}
			}else{
				echo json_encode("Error Getting Reports");
			}
		}else{
			echo json_encode("No such admin with username: ".$admin);
		}
		$conn->close();
	}else{
		echo json_encode("Permission Denied!");
	}
?>