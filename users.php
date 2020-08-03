<?php
	require_once 'db_connection.php';
	//$name = $_POST['fname'];
	$name = 2;
	$sql = "SELECT * FROM `mdl_user` WHERE id = $name";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$data[]=$row;
		}
		$response["success"] = 'success';
		$response["message"] = 'Logged in successfull';
		$response["data"] = $data;
		
		echo json_encode($response);
	} else {
		$response["success"] = 'failure';
		$response["message"] = 'Sorry, Invalid username or password';
		echo json_encode($response);
	}
	$conn->close();
?>
