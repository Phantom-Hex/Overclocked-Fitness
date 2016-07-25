<?php

require_once('database.php');

class Contact
{
	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->db();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$command = $this->conn->prepare($sql);
		return $command;
	}
	
/* Client coding */
	
	public function clientRegister($firstname,$lastname,$age,$height,$weight,$email,$gender,$chest,$waist,$hip,$neck,$forearm,$tricep,$bicep,$thigh,$calves)
	{
	try {
		$command = $this->conn->prepare(
		"INSERT INTO clients (firstname, lastname, age, height, weight, email, gender, chest, waist, hip, neck, forearm, tricep, bicep, thigh, calves) 
		VALUES (:firstname, :lastname, :age, :height, :weight, :email, :gender, :chest, :waist, :hip, :neck, :forearm, :tricep, :bicep, :thigh, :calves)");
		
		$command->bindparam(":firstname", $firstname);
		$command->bindparam(":lastname", $lastname);
		$command->bindparam(":age", $age);
		$command->bindparam(":height", $height);
		$command->bindparam(":weight", $weight);
		$command->bindparam(":email", $email);
		$command->bindparam(":gender", $gender);
		$command->bindparam(":chest", $chest);
		$command->bindparam(":waist", $waist);
		$command->bindparam(":hip", $hip);
		$command->bindparam(":neck", $neck);
		$command->bindparam(":forearm", $forearm);
		$command->bindparam(":tricep", $tricep);
		$command->bindparam(":bicep", $bicep);
		$command->bindparam(":thigh", $thigh);
		$command->bindparam(":calves", $calves);
		$command->execute();
		return $command;
		} catch(PDOException $e) {
		echo $e->getMessage();
		}
	}
  
  /*newsletter code */
  
  public function newsRegister($name,$email) {
	try {
		$command = $this->conn->prepare(
		"INSERT INTO newsletter ('name', 'email')
		 VALUES (:name, :email)");
		
		$command->bindparam(":name", $name);
		$command->bindparam(":email", $email);
		
		$command->execute();
		return $command;
		} catch(PDOException $e) {
    	echo "NOPE. NOT TODAY!";
		echo '<br />';
		echo $e->getMessage();
		}
	}
     
   public function redirect($url){
       header("Location: $url");
	}
}
?>