<?php

/* Database connecting! */
class Database
{   
    private $host = "localhost";
    private $db_name = "burnerbase";
    private $username = "root";
    private $password = "";
    public $conn;
     
    public function db()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=".$this->host .";dbname=". $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
		catch(PDOException $exception)
		{
            echo "ERROR DETECTED: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
?>