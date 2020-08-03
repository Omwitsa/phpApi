<?php
// https://www.youtube.com/watch?v=H7tSg98RW7U  // wordpress
	$servername = 'localhost';
	$username = 'Admin';
	$password = 'Mjumbe123';
	$dbname = 'e_learning';
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: $conn->connect_error");
	}
?>
