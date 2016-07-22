<link rel="stylesheet" type="text/css" href="inc/styles/main.css" />
<?php
require("inc/inc/heading.php");

// define variables and set to empty values
$firstnameErr = $lastnameErr = $ageErr = $heightErr = $weightErr = $emailErr = $genderErr = $chestErr = $waistErr = $hipErr = $neckErr = $forearmErr = $tricepErr = $bicepErr = $thighErr = $calvesErr ="";
$firstname = $lastname = $age = $height = $weight = $email = $gender = $chest = $waist = $hip = $neck = $forearm = $tricep = $bicep = $thigh = $calves ="";

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
    if (!preg_match("/^[0-9]*$/",$name)) {
      $ageErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["chest"])) {
    $chestErr = "Chest length is required";
  } else {
    $chest = test_input($_POST["chest"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$name)) {
      $chestErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["waist"])) {
    $waistErr = "Waist length is required";
  } else {
    $waist = test_input($_POST["chest"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$name)) {
      $waistErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["hip"])) {
    $hipErr = "Hip length is required";
  } else {
    $hip = test_input($_POST["chest"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$name)) {
      $hipErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["neck"])) {
    $neck = NULL;
  } else {
    $neck = test_input($_POST["neck"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$name)) {
      $neckErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["forearm"])) {
    $forearm = NULL;
  } else {
    $forearm = test_input($_POST["forearm"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$name)) {
      $forearmErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["tricep"])) {
    $tricep = NULL;
  } else {
    $tricep = test_input($_POST["tricep"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$name)) {
      $tricepErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["bicep"])) {
    $bicep = NULL;
  } else {
    $bicep = test_input($_POST["bicep"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$name)) {
      $bicepErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["thigh"])) {
    $thigh = NULL;
  } else {
    $thigh = test_input($_POST["thigh"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$name)) {
      $thighErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["calves"])) {
    $calves = NULL;
  } else {
    $calves = test_input($_POST["calves"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$name)) {
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

?>
<div class="Inputs" style="text-align:center">
<p>
You want to get started on your path to glory? Well, first we got to know a little about yourself!  Fill out this tiny questionaire and someone will contact you about your needs and what-have-you so we can get your rig jumpstarted, see what parts you need, and assess what we're working with.  Don't worry, you don't need to sign anything in blood, it's just a general idea of who you are.  The formalities can be saved for later.
<br><br>
(*Denotes a required field)</P>
    <form class="Client Data" name="Client" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); database.php?>">
    <p><h3>Client Questionnaire</h3>
        <label for="client">First Name: <br><input type="text" name="First Name" value="<?php echo $firstname;?>">
  <span class="error">* <?php echo $firstnameErr;?></span></label>
        <br><br>
        <label for="client">Last Name: <br><input type="text" name="Last Name" value="<?php echo $lastname;?>">
  <span class="error">* <?php echo $lastnameErr;?></span></label>
        <br><br>
        <label for="client">E-Mail: <br><input type="email" name="Email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span></label>
        <br><br>
        <label for="client">Confirm E-Mail: <br><input type="email" name="Age" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span></label>
        <br><br>
    </p>
    <p><h3>Basic Information</h3>
    <Label for="Client">Gender: <br>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
    <label for="client">Age<br><input type="text" name="Age" value="<?php echo $age;?>">
  <span class="error">* <?php echo $ageErr;?></span></label>
    <br><br>
    <label for="client">Height<br><input type="text" name="Height" value="<?php echo $height;?>">
  <span class="error">* <?php echo $heightErr;?></span></label>
    <br><br>
    <label for="client">Weight<br><input type="text" name="Weight" value="<?php echo $weight;?>">
  <span class="error">* <?php echo $weightErr;?></span></label>
    <br><br>
    </p>
    <p><h3>Body Measurements</h3>
    <label for="client">Chest*: <br><br><input type="text" name="Chest" value="<?php echo $chest;?>">
  <span class="error">* <?php echo $chestErr;?></span></label><br><br>
    <label for="client">Waist*: <br><input type="text" name="Waist" value="<?php echo $waist;?>">
  <span class="error">* <?php echo $waistErr;?></span></label><br><br>
    <label for="client">Hips*: <br><input type="text" name="Hips" value="<?php echo $hip;?>">
  <span class="error">* <?php echo $hipErr;?></span></label><br><br>
    <label for="client">Neck: <br><input type="text" name="Neck" value="<?php echo $neck;?>">
  <span class="error">* <?php echo $neckErr;?></span></label><br><br>
    <label for="client">Forearm: <br><input type="text" name="Forearm" value="<?php echo $forearm;?>">
  <span class="error">* <?php echo $forearmErr;?></span></label><br><br>
    <label for="client">Tricep: <br><input type="text" name="Tricep" value="<?php echo $tricep;?>">
  <span class="error">* <?php echo $tricepErr;?></span></label><br><br>
    <label for="client">Bicep: <br><input type="text" name="Bicep" value="<?php echo $bicep;?>">
  <span class="error">* <?php echo $bicepErr;?></span></label><br><br>
    <label for="client">Thigh: <br><input type="text" name="Thigh" value="<?php echo $thigh;?>">
  <span class="error">* <?php echo $thighErr;?></span></label><br><br>
    <label for="client">Calves: <br><input type="text" name="Calves" value="<?php echo $calves;?>">
  <span class="error">* <?php echo $calvesErr;?></span></label><br><br>
    
    <input style"text-align: center" type="submit" name="Submit">
    </form>
</div>
