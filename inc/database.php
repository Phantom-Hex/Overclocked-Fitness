<?php

try {
  $db = new PDO("mysql:host=localhost;dbname=burnerbase;port=3306","root","");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Database Connected";
} catch (Exception $e) {
  echo "Database not found. Connection terminated.";
  exit;
}

try {
  $results = $db->query("SELECT * FROM clients ORDER BY first_name ASC");
} catch (Exception $e) {
  echo "Query not found. Connection terminated.";
  exit;
}

function clientAdd() {
	$firstname = $_POST['first_name'];
	$lastname = $_POST['last_name'];
	$age = $_POST['age'];
	$height = $_POST['height'];
	$weight = $_POST['weight'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$chest = $_POST['chest'];
	$waist = $_POST['waist'];
	$hip = $_POST['hip'];
	$neck = $_POST['neck'];
	$forearm = $_POST['forearm'];
	$tricep = $_POST['tricep'];
	$bicep = $_POST['bicep'];
	$thigh = $_POST['thigh'];
	$calves = $_POST['calves'];
	try {
    $newuser = $db->prepare("INSERT INTO Clients (first_name, last_name, age, height, weight, email, gender, chest, waist, hip, neck, forearm, tricep, bicep, thigh, calves)
     VALUES ('$firstname', '$lastname', '$age', '$height', '$weight', '$email', '$gender', '$chest', '$waist', '$hip', '$neck', '$forearm', '$tricep', '$bicep', '$thigh', '$calves')");
    // use exec() because no results are returned
    $db->exec($newuser);
	$data = mysql_query ($db) or die(mysql_error());
	if($data) { 
		echo "YOU'RE IN! We'll get to you in 24 hours, bro!"; 
		}
    echo "New record created successfully!";
    }
catch(PDOException $e)
    {
    echo $db . "<br>" . $e->getMessage();
    exit;
	}
}

function newsletterAdd() {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$newfollower = "";
	try {
		$newuser = $db->prepare("INSERT INTO Newsletter (name, email)
		 VALUES ('$name', '$email')");
		// use exec() because no results are returned
		$db->exec($newfollower);
		echo "New record created successfully!";
		}
	catch(PDOException $e) {
    echo "NOPE. NOT TODAY!";
    exit;
	}
	
	if(isset($_POST['submit']))
		{
			newsletterAdd();
		}	
}
?>