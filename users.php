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
				$sql = "SELECT * FROM `users` WHERE Username = '$data->username' && Password = '$data->password'";
				$result = $db_operation->query($sql);
				
				echo $result;
			}
			
			if($data->operation == 'userRegister'){
				if(empty($data->username) || empty($data->password)){
					$response["success"] = "failure";
					$response["message"] = "Parameters should not be empty !";
					$result = json_encode($response);
				}
				else{
					$username = $data->username;
					$password = $data->password;
					$sql = "SELECT * FROM `users` WHERE Username = '$username' && Password = '$password'";
					$result = $db_operation->query($sql);
					$data = json_decode($result);
					if($data->success == 'failure'){
						$sql = "INSERT INTO users (`Username`, `Password`) VALUES('$username', '$password')";
						$result = $db_operation->insert($sql);
					}
				}
				
				echo $result;
			}
			
			if($data->operation == 'clientRegister'){
				if(empty($data->username) || empty($data->password)){
					$response["success"] = "failure";
					$response["message"] = "Parameters should not be empty !";
					$result = json_encode($response);
				}
				else{
					$sql = "INSERT INTO clientMember (`Username`, `Password`) VALUES('$data->username', '$data->password')";
					$result = $db_operation->insert($sql);
				}
				echo $result;
			}
		}
	}
	else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	  echo "You're in AmTech API"; 
	}