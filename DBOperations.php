<?php
class DBOperation{
	private $host = 'localhost';
	private $user = 'Admin';
	private $db = 'amtechaf_mobilebanking';
	private $pass = 'Mjumbe123';
	private $conn;
	
	public function __construct() {
		$this->conn = new PDO("mysql:host=".$this -> host.";dbname=".$this -> db, $this -> user, $this -> pass);
	}
	
	public function query($sql){
		try{
			foreach ($this->conn->query($sql) as $row)
			{
				$result[]=$row;
			}
			
			if(empty($result)){
				$response["success"] = "failure";
				$response["message"] = "Sorry, Invalid username or password";
				return json_encode($response);
			}
			else{
				$response["success"] = "success";
				$response["message"] = "Logged in successfully";
				$response["data"] = $result;
				
				return json_encode($response);
			}
		}
		catch(PDOException $e) {
			//echo "Error: " . $e->getMessage();
			$response["success"] = "failure";
			$response["message"] = "Sorry, Invalid username or password";
			return json_encode($response);
		}
	}
	
	public function insert($sql){
		try{
			$this->conn->exec($sql);
			
			$response["success"] = "success";
			$response["message"] = "You have registered successfully";
			return json_encode($response);
		}
		catch(PDOException $e) {
			//echo "Error: " . $e->getMessage();
			$response["success"] = "failure";
			$response["message"] = "Sorry, An error occurred";
			return json_encode($response);
		}
	}
}