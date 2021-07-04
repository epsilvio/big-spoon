<?php
	function writeDB($info, $link){
		require("call_db.php");
		$pic = "http://192.53.175.7/".$link;
		$food = $info[0]['name'];
		$category= $info[0]['category'];
		$description = $info[0]['description'];
		$location = $info[0]['location'];
		$owner = $info[0]['owner'];
		$postTime = $info[0]['posted_time'];
		$postDate = $info[0]['date'];
		$status = $info[0]['status'];
		$rows = array();
		$sqlName = "SELECT `fname`, `lname` FROM `accounts` WHERE `uid` = '{$owner}'";
		$result = $conn->query($sqlName);
		if(!($result === FALSE)){
			if(!($result -> num_rows === 0)){
				while($r = mysqli_fetch_assoc($result)) {
    					$ownerName = $r["fname"]." ".$r["lname"];
				}
			}else{
				return "No Such User";
			}
		}else{
			return "Error: " . $sql . "<br>" . $conn->error;
		}
		$sql = "INSERT INTO `posted_foods`(`foodName`, `category`, `description`, `location`, `time_posted`, `date_posted`, `owner`, `owner_name`, `status`, `pic_link`) VALUES ('{$food}','{$category}','{$description}','{$location}','{$postTime}','{$postDate}','{$owner}','{$ownerName}','{$status}', '{$pic}')";
		if ($conn->query($sql) === TRUE) {
			return json_encode("New record created successfully for ".$ownerName);
		}else{
			return json_encode("There was an error posting the food, please try again later. ".$conn->error);
		}
		$conn->close();
	}
	if(!empty($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
		require("call_db.php");
		$file = $_FILES['file'];
		$info = json_decode($_POST['info'], true);
		$newInfo = Array();
		$fileName = $file['name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];
		$fileTmpName = $file['tmp_name'];
		$fileExt = explode(".", $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowedExt = array("jpg", "jpeg", "png");
		foreach($info as $x => $val){
			$newInfo[$x] = $val;
		}
		if(in_array($fileActualExt, $allowedExt)){
			if($fileError === 0){
				if($fileSize <=	5000000){
					$newName = uniqid('', true).".".$fileActualExt;
					$path = "upload/".$newName;
					move_uploaded_file($fileTmpName, $path);
					$resp = writeDB($newInfo, $path);
					echo $resp;
				}else{
					echo "You can only upload files that are 5 MB or less!";
				}
			}else{
				echo "Error Uploading File!";
			}
		}else{
			$food = $newInfo[0]['name'];
			$category= $newInfo[0]['category'];
			$description = $newInfo[0]['description'];
			$location = $newInfo[0]['location'];
			$owner = $newInfo[0]['owner'];
			$postTime = $newInfo[0]['posted_time'];
			$postDate = $newInfo[0]['date'];
			$status = $newInfo[0]['status'];
			$rows = array();
			$sqlName = "SELECT `fname`, `lname` FROM `accounts` WHERE `uid` = '{$owner}'";
			$result = $conn->query($sqlName);
			if(!($result === FALSE)){
				if(!($result -> num_rows === 0)){
					while($r = mysqli_fetch_assoc($result)) {
    						$ownerName = $r["fname"]." ".$r["lname"];
					}
				}else{
					return "No Such User";
				}
			}else{
				return "Error: " . $sql . "<br>" . $conn->error;
			}
			$sql = "INSERT INTO `posted_foods`(`foodName`, `category`, `description`, `location`, `time_posted`, `date_posted`, `owner`, `owner_name`, `status`) VALUES ('{$food}','{$category}','{$description}','{$location}','{$postTime}','{$postDate}','{$owner}','{$ownerName}','{$status}')";
			if ($conn->query($sql) === TRUE) {
				return json_encode("New record created successfully for ".$ownerName);
			}else{
				return json_encode("There was an error posting the food, please try again later. ".$conn->error);
			}
		}
		$conn->close();
	}else{
		Echo "You can't post food here!";
	}
?>