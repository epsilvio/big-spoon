<?php
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
?>