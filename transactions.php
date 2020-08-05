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
			if($data->operation == 'deposit'){
				$sql = "INSERT INTO deposits (Supp_no, Amount, Pin, Fingerprint) VALUES('$data->sNo', '$data->amount', '$data->pin', '$data->fingerePrint')";
				$result = $db_operation->insert($sql);
				$data = json_decode($result);
				$response["success"] = $data->success;
				$response["message"] = 'Deposited successfully';
				
				/*if($data->success == 'failure'){
					$response["message"] = 'Sorry, An error occurred';
				}*/
				echo $result;
			}
			
			if($data->operation == 'withdraw'){
				$sql = "INSERT INTO withdraws (Supp_no, Amount, Pin, Fingerprint) VALUES('$data->sNo', '$data->amount', '$data->pin', '$data->fingerePrint')";
				$result = $db_operation->insert($sql);
				$data = json_decode($result);
				$response["success"] = $data->success;
				$response["message"] = 'Withdrawn successfully';
				
				if($data->success == 'failure'){
					$response["message"] = 'Sorry, An error occurred';
				}
				echo $result;
			}
		}
	}
	else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	  echo "You're in AmTech API"; 
	}