<?php

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
	$newUser= "";
	
	$firstname = strip_tags($firstname);
	$lastname = strip_tags($lastname);
	$age = strip_tags($age);
	$height = strip_tags($height);
	$weight = strip_tags($weight);
	$email = strip_tags($email);
	$gender = strip_tags($gender);
	$chest = strip_tags($chest);
	$waist = strip_tags($waist);
	$hip = strip_tags($hip);
	$neck = strip_tags($neck);
	$forearm = strip_tags($forearm);
	$tricep = strip_tags($tricep);
	$bicep = strip_tags($bicep);
	$thigh = strip_tags($thigh);
	$calves = strip_tags($calves);
	
	//check for email already in system
	
	try {
		$newUser = $db->prepare("INSERT INTO Clients (first_name, last_name, age, height, weight, email, gender, chest, waist, hip, neck, forearm, tricep, bicep, thigh, calves)
		 VALUES ('$firstname', '$lastname', '$age', '$height', '$weight', '$email', '$gender', '$chest', '$waist', '$hip', '$neck', '$forearm', '$tricep', '$bicep', '$thigh', '$calves')");
		// use exec() because no results are returned
		$db->exec($newUser);
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
	try {
		$newFollower = $db->prepare("INSERT INTO Newsletter ('name', 'email')
		 VALUES ('$name', '$email')");
		// use exec() because no results are returned
		$db->execute($newFollower);
		echo "New record created successfully!";
		}
	catch(PDOException $e) {
    echo "NOPE. NOT TODAY!";
    exit;
	}
	
	if(!isset($_POST['submit']))
		{
			exit;
		}
		
}
?>


<!--
<?php

class Contact
{
	private $db;
	
	function __construct($db){
		$this->db = $db;
	}
	
	public function redirect($url){
       header("Location: $url");
   	}
	
/* Client coding */
	
	public function clientRegister($firstname,$lastname,$age,$height,$weight,$email,$gender,$chest,$waist,$hip,$neck,$forearm,$tricep,$bicep,$thigh,$calves)
	{
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
		
		$firstname = strip_tags($firstname);
		$lastname = strip_tags($lastname);
		$age = strip_tags($age);
		$height = strip_tags($height);
		$weight = strip_tags($weight);
		$email = strip_tags($email);
		$gender = strip_tags($gender);
		$chest = strip_tags($chest);
		$waist = strip_tags($waist);
		$hip = strip_tags($hip);
		$neck = strip_tags($neck);
		$forearm = strip_tags($forearm);
		$tricep = strip_tags($tricep);
		$bicep = strip_tags($bicep);
		$thigh = strip_tags($thigh);
		$calves = strip_tags($calves);

	try {
		$clientQuery = $this->db->prepare("INSERT INTO clients (first_name, last_name, age, height, weight, email, gender, chest, waist, hip, neck, forearm, tricep, bicep, thigh, calves)
		 VALUES ('$firstname', '$lastname', '$age', '$height', '$weight', '$email', '$gender', '$chest', '$waist', '$hip', '$neck', '$forearm', '$tricep', '$bicep', '$thigh', '$calves')");
		$clientQuery->execute();
		return $clientQuery;
		} catch(PDOException $e) {
		echo $e->getMessage();
		}
	}
  
  /*newsletter code */
  
  public function newsRegister() {
	try {
		$newFollower = $this->db->prepare(
		"INSERT INTO newsletter ('name', 'email')
		 VALUES (:name, :email)");
		$newFollower->bindparam(":name", $name);
		$newFollower->bindparam(":email", $email);
		// use execute() because no results are returned
		$newFollower->execute();
		return $newFollower;
		echo "New record created successfully!";
		} catch(PDOException $e) {
    	echo "NOPE. NOT TODAY!";
	}
  }
  
  
  
  /*login for new users? */
  
  public function login($uname,$umail,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname OR user_email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $userRow['user_pass']))
             {
                $_SESSION['user_session'] = $userRow['user_id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
  public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
  
  public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>
--!>