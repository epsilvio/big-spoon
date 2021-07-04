<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $uid = $_GET["uid"];
    $fname = $_GET["fName"];
    $lname = $_GET["lName"];
    $cnum = $_GET["cNum"];
    $photo = $_GET["photo"];
    $jDate = $_GET["jdate"];

	$servername = "139.177.187.114";
	$username = "root";
	$password = "example";
	$dbname = "bigspoon_db";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO `accounts`(`uid`, `fname`, `lname`, `cnum`, `photo_url`, `creationDate`, `last_update`) VALUES ('{$uid}','{$fname}','{$lname}','{$cnum}','{$photo}','{$jDate}', CAST(current_date() AS DATE))";

	if ($conn->query($sql) === TRUE) {
		echo "You have been registered successfully!";
	} else {
		echo "Error: Account already existing!";
	}
	$conn->close();
}else{
	echo "You can't access the db!";
}
	
?>;