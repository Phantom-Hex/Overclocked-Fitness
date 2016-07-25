<link rel="stylesheet" type="text/css" href="styles/main.css" />
<?php
require("inc/database.php");
require("inc/heading.php");

// define variables and set to empty values
$nameErr = $emailErr = "";
$name = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
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

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="section1">
    <p>For all business inquiries and questions, please contact Tony directly by clicking <a href="mailto: TatsumakiFitness@mail.com">here</a> or leave a comment below.
    </p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="text/plain">
    <p>For all other questions, please fill out this form.
    <br>
    (* Denotes a required field)</p>
    <p><label for="newsletter">Name: <br></label><input type="text" id="name" placeholder="Somebody Inquisitive" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span></p>
    <p><label for="newsletter">E-Mail: <br></label><input type="Email" id="Email" placeholder="someone@somemailbox.com" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span></p>
    <p><textarea name="comment" rows="3" cols="40"><?php echo $comment;?>Tell me how you really feel. </textarea></p>
    <p><button type="button" name="submit" value="Client">Send!</button> 
    </form>
</div>
<?php require("inc/footing.php");?>