<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		require("call_db.php");
		$user = $_GET["user"];
		$pass = $_GET["pass"];
		$npass = $_GET["npass"];
		$test = "SELECT * FROM `user_admins` WHERE `username` = '{$user}' AND `password` = '{$pass}'";
		$testres = $conn->query($test);
		$sql = "UPDATE `user_admins` SET `password` = '{$npass}' WHERE `username` = '{$user}' AND `password` = '{$pass}'";
		$res = $conn->query($sql);
		if($testres->num_rows > 0){
			if($res === TRUE){
				echo "Password updated!";
			}else{
				echo "There was an error updating your password: ".$conn->error;
			}
		}else{
			echo "Wrong Credentials! Try again.";
		}
		$conn->close();
	}else{
		echo "You can't access the db!";
	}
?>