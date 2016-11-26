<?php

<<<<<<< HEAD
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
=======
try {
  $db = new PDO("mysql:host=localhost;dbname=clients;port=3306","root","Cyclone");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec("SET NAMES 'utf-8'");
  echo "Database Connected";
} catch (Exception $e) {
  echo "Database not found. Connection terminated.";
  exit;
}

try {
  $results = $db->query("SELECT name,age,height FROM person ORDER BY name ASC");
} catch (Exception $e) {
  echo "Query not found. Connection terminated.";
  exit;
}

echo "<pre>";
var_dump($results->fetchAll(PDO::FETCH_ASSOC));

?>
>>>>>>> parent of 3adff51... Fifth Commit
