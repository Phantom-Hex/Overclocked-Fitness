<?php
/* Database connecting! */
class Database
{
    private $host = "localhost";
    private $db_name = "Burnerbase";
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
            echo "<dialog open> ERROR DETECTED: ";
            echo $exception->getMessage();
            echo ". You saw nothing. </dialog>";
        }
        return $this->conn;
    }
}
?>