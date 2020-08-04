<?php
class DBOperation{
	private $host = 'localhost';
	private $user = 'Admin';
	private $db = 'e_learning';
	private $pass = 'Mjumbe123';
	public $conn;
	
	public function __construct() {
		$this -> conn = new PDO("mysql:host=".$this -> host.";dbname=".$this -> db, $this -> user, $this -> pass);
	}
	
	public function query($sql){
		try{
			foreach ($this->conn->query($sql) as $row)
			{
				$result[]=$row;
			}
			
			if(empty($result)){
				$response["result"] = "failure";
				$response["message"] = "Sorry, Invalid username or password";
				return json_encode($response);
			}
			else{
				$response["result"] = "success";
				$response["message"] = "Logged in successfully";
				$response["data"] = $result;
				
				return json_encode($response);
			}
		}
		catch(PDOException $e) {
			//echo "Error: " . $e->getMessage();
			$response["result"] = "failure";
			$response["message"] = "Sorry, Invalid username or password";
			return json_encode($response);
		}
	}
}