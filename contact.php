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

<main class="container">
    <h2 class="display-4 pt-4">@ViewData["Title"]</h2>
    <h3>Contact Us</h3>

    <address>
        We are located in Louisville, Kentucky.
    </address>
    <div id="googleMap" style="width:100%;height:400px;"></div>
    <address>
        <strong>Support:</strong> <a href="mailto:Admin@PhantomHex.com">Click here</a> |
        <strong>Marketing:</strong> <a href="mailto:Admin@PhantomHex.com">Click here</a>
    </address>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzqB6cnnw2nH2aVSUP_CHNBgYQsasySmY&callback=myMap"></script>
</main>
<?php require("inc/footing.php");?>