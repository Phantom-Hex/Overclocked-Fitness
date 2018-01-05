<!-- <link rel="stylesheet" type="text/css" href="styles/main.css" /> -->
<?php
require("inc/database.php");
require("inc/heading.php");
require("inc/class-contact.php");

$contact = new Contact();

// define variables and set to empty values
$firstnameErr = $lastnameErr = $ageErr = $heightErr = $weightErr = $emailErr = $genderErr = $chestErr = $waistErr = $hipErr = $neckErr = $forearmErr = $tricepErr = $bicepErr = $thighErr = $calvesErr ="";
$firstname = $lastname = $age = $height = $weight = $email = $gender = $chest = $waist = $hip = $neck = $forearm = $tricep = $bicep = $thigh = $calves ="";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if lastname only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed"; 
    }
  }
  
   if (empty($_POST["firstname"])) {
    $firstnameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if firstname only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  } else {
    $age = test_input($_POST["age"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$age)) {
      $ageErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["height"])) {
    $heightErr = "height is required";
  } else {
    $height = test_input($_POST["height"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$height)) {
      $heightErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["weight"])) {
    $weightErr = "weight is required";
  } else {
    $weight = test_input($_POST["weight"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$weight)) {
      $weightErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["chest"])) {
    $chestErr = "Chest length is required";
  } else {
    $chest = test_input($_POST["chest"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$chest)) {
      $chestErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["waist"])) {
    $waistErr = "Waist length is required";
  } else {
    $waist = test_input($_POST["waist"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$waist)) {
      $waistErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["hip"])) {
    $hipErr = "Hip length is required";
  } else {
    $hip = test_input($_POST["hip"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$hip)) {
      $hipErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["neck"])) {
    $neck = NULL;
  } else {
    $neck = test_input($_POST["neck"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$neck)) {
      $neckErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["forearm"])) {
    $forearm = NULL;
  } else {
    $forearm = test_input($_POST["forearm"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$forearm)) {
      $forearmErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["tricep"])) {
    $tricep = NULL;
  } else {
    $tricep = test_input($_POST["tricep"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$tricep)) {
      $tricepErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["bicep"])) {
    $bicep = NULL;
  } else {
    $bicep = test_input($_POST["bicep"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$bicep)) {
      $bicepErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["thigh"])) {
    $thigh = NULL;
  } else {
    $thigh = test_input($_POST["thigh"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$thigh)) {
      $thighErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["calves"])) {
    $calves = NULL;
  } else {
    $calves = test_input($_POST["calves"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$calves)) {
      $calvesErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

if(isset($_POST['Client'])){
	try
      {
         if($contact->clientRegister($firstname,$lastname,$age,$height,$weight,$email,$gender,$chest,$waist,$hip,$neck,$forearm,$tricep,$bicep,$thigh,$calves)){
                $contact->redirect('FirstClient.php?joined');
            	}
	  } catch(PDOException $e)
     {
        echo $e->getMessage();
     }
}
?>
<?php
if(isset($_GET['joined']))
		{
			 ?>
               <h2 style="text-align:center">We've got you in the system!</h2>
             <?php
		}
?>
<div class="container text-center">
  <h3 class="display-4 py-4">Client Questionnaire</h3>
  <p class="lead">
    You want to get started on your path to glory? Well, first we got to know a little about yourself!  Fill out this tiny questionaire and someone will contact you about your needs and what-have-you so we can get your rig jumpstarted, see what parts you need, and assess what we're working with.  Don't worry, you don't need to sign anything in blood, it's just a general idea of who you are.  The formalities can be saved for later.
  <br>(*Denotes a required field)</p>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!-- Form coding -->
      <div class="row">
        <div class="col-md-6">
        <h3 class="text-center">Basic Information</h3>
          <div class="form-group">
            <input class="form-control" type="text" name="firstname" placeholder="First Name*" value="<?php echo $firstname;?>">
              <span class="error"><?php echo $firstnameErr;?></span><br />
            <input class="form-control" type="text" name="lastname" placeholder="Last Name*" value="<?php echo $lastname;?>">
              <span class="error"><?php echo $lastnameErr;?></span><br />
            <input class="form-control" type="email" name="email" placeholder="E-mail Address*" value="<?php echo $email;?>">
              <span class="error"><?php echo $emailErr;?></span><br />
            <input class="form-control" type="email" name="email" placeholder="Confirm E-mail*" value="<?php echo $email;?>">
              <span class="error"><?php echo $emailErr;?></span><br />
          </div>
          <div class="form-group">
            <Label for="Client">Sex*:<br>
            <div class="form-check">
              <input class="form-check-input" type="radio" id="radio1" name="gender male" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">
              <label class="form-check-label" for="radio1">Male</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" id="radio2" name="gender female" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">
              <label class="form-check-label" for="radio2">Female</label>
              <span class="error"><?php echo $genderErr;?></span><br />
            </div>
            <br />
            <input class="form-control" type="text" name="age" placeholder="Age*" value="<?php echo $age;?>">
              <span class="error"><?php echo $ageErr;?></span><br />
            <input class="form-control" type="text" name="height" placeholder="Height* (in inches only)" value="<?php echo $height;?>">
              <span class="error"><?php echo $heightErr;?></span><br />
            <input class="form-control" type="text" name="weight" placeholder="Weight* (in lbs.)" value="<?php echo $weight;?>">
              <span class="error"><?php echo $weightErr;?></span><br />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <h3 class="text-center">Body Measurements</h3>
            <input class="form-control" type="text" name="chest" placeholder="Chest* (in inches)" value="<?php echo $chest;?>">
            <span class="error"><?php echo $chestErr;?></span><br />
            <input class="form-control" type="text" name="waist" placeholder="Waist* (in inches)" value="<?php echo $waist;?>">
            <span class="error"><?php echo $waistErr;?></span><br />
            <input class="form-control" type="text" name="hip" placeholder="Hips* (in inches)" value="<?php echo $hip;?>">
            <span class="error"><?php echo $hipErr;?></span><br />
            <input class="form-control" type="text" name="neck" placeholder="Neck (in inches)" value="<?php echo $neck;?>">
            <span class="error"><?php echo $neckErr;?></span><br />
            <input class="form-control" type="text" name="forearm" placeholder="Forearm (in inches)" value="<?php echo $forearm;?>">
            <span class="error"><?php echo $forearmErr;?></span><br />
            <input class="form-control" type="text" name="tricep" placeholder="Tricep (in inches)" value="<?php echo $tricep;?>">
            <span class="error"><?php echo $tricepErr;?></span><br />
            <input class="form-control" type="text" name="bicep" placeholder="Bicep (in inches)" value="<?php echo $bicep;?>">
            <span class="error"><?php echo $bicepErr;?></span><br />
            <input class="form-control" type="text" name="thigh" placeholder="Thigh (in inches)" value="<?php echo $thigh;?>">
            <span class="error"><?php echo $thighErr;?></span><br />
            <input class="form-control" type="text" name="calves" placeholder="Calves (in inches)" value="<?php echo $calves;?>">
            <span class="error"><?php echo $calvesErr;?></span><br />
          </div>
        </div>
      </div>
      <button type="submit" name="Client" class="btn btn-primary text-center">Time to learn too much!</button>
    </form>
  </div>
<?php require("inc/footing.php") ?>