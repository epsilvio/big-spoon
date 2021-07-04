<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		require("call_db.php");
		$user = $_GET["user"];
		$pass = $_GET["pass"];
		$sql = "SELECT `adminId` FROM `user_admins` WHERE `username` = '{$user}' AND `password` = '{$pass}'";
		$result = $conn->query($sql);
		if($result->num_rows === 1){
			while($r = mysqli_fetch_array($result)){
				$id = $r;
			}
			echo json_encode($id);
		}else{
			echo 0;
		}
		$conn->close();
	}else{
		echo "You can't acces the db!";
	}
?>