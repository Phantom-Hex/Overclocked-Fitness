<?php

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
