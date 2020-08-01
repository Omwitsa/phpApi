<?php
$servername = "localhost";
$username = "Admin";
$password = "Mjumbe123";
$dbname = "e_learning";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$name = $_POST['fname'];
$name = 2;
$sql = "SELECT * FROM `mdl_user` WHERE id = " . $name;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$response["success"] = "success";
	$response["message"] = "Logged in successfull";
	echo json_encode($response);
    /*// output data of each row
    while($row = $result->fetch_assoc()) {
		$willy[]=$row;
    }
	
	echo json_encode($willy);*/
} else {
    $response["success"] = "failure";
	$response["message"] = "Sorry, Invalid username or password";
	echo json_encode($response);
}
$conn->close();
?> 