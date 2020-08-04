<?php
	require_once 'DBOperations.php';
	$db_operation = new DBOperation();
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$data = json_decode(file_get_contents("php://input"));
		
		if(empty($data->operation)){
			$response["success"] = "failure";
		    $response["message"] = "Parameters should not be empty !";
			echo json_encode($response);
		}
		else{
			if($data->operation == 'login'){
				$sql = "SELECT * FROM `users` WHERE Username = $data->Username";
				//$sql = "SELECT * FROM `users` WHERE Username = 2";
				$result = $db_operation->query($sql);
				
				echo $result;
			}
			
			if($data->operation == 'register'){
				if(!empty($data->name)){
					$sql = "INSERT INTO users (`Name`, `Coop-Name`, `Username`, `Password`, `Phone Number`, `idno`) VALUES('$data->name', '$data->coopName', '$data->username', '$data->password', '$data->phoneNo', '$data->idno')";
					$result = $db_operation->insert($sql);
				}
				echo $result;
			}
		}
	}
	else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	  echo "You're in AmTech API"; 
	}