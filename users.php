<?php
	require_once 'DBOperations.php';
	$db_operation = new DBOperation();
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$data = json_decode(file_get_contents("php://input"));
		
		if(empty($data->operation)){
			$response["result"] = "failure";
		    $response["message"] = "Parameters should not be empty !";
			echo json_encode($response);
		}
		else{
			if($data->operation == 'login'){
				$sql = "SELECT * FROM `mdl_user` WHERE id = $data->name";
				$result = $db_operation->query($sql);
				
				echo $result;
			}
		}
	}
	else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	  echo "You're in AmTech API"; 
	}