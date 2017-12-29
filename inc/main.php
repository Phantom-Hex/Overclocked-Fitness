<?php
require_once("class-contact.php");
$contact = new Contact();

if(isset($_POST['Register']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];

	try
      {
         $command = $contact->runQuery("SELECT name,email	FROM newsletter WHERE name=:name OR email=:email");
         $command->execute(array(':name'=>$name, ':email'=>$email));
         $row=$command->fetch(PDO::FETCH_ASSOC);

         if($row['user_name']==$name) {
            $error[] = "There's probably a lot of you out there, but you know what? We don't mind another one of you.";
         }
         else if($row['user_email']==$email) {
            $error[] = "Hey, you must've been here before.";
		 }
         else {
			 if($contact->newsRegister($name,$email)){
                $contact->redirect('index.php?joined');
            }
         }
	  }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
}
?>
<?php
if(isset($_GET['joined']))
		{
			 ?>
               <h2 style="text-align:center">You're signed up!  Prepare for all the spam!</h2>
             <?php
		}
?>
<!-- first page content starts -->
<section class="container-fluid text-center">
  <div class="Section1 p-5 text-left">
    <h3>Ready to Level Up?</h3>
    <p>Fitness takes hard work, dedication, knowledge, and passion.  It's not just protein shakes, kale smoothies, weird green concoctions, and roid rage.  Hack your body and become something more than the current version of yourself.</p>
  </div>
  <div class="jumbotron display-2">
    <h2>Hack your body, hack yourself</h2>
  </div>
  <div class="Section2 p-5">
    <h3>Highly efficient!</h3>
    <p>Lots of folks stay in the gym for nearly 2 to 3 hours a day; and they're those big bulky bros looking to compete in a steel-tossing kumite!  At O.F., we believe in explosive plyometric movement, calisthenic exercise, and short-burst HIIT in order to get results in just under half the time.  Maximum effort, the merc says.</p>
    <p>
     Each program is custom-made for any body type and lifestyle.  Whether you have all the time in the world, a 9-to-5 business suit, or a nocturnal vampire, there are plans available for all times of the day and night!  There's 24 hours in a day, you can afford <strong>under an hour!</strong>
   </p>
  </div>
  <div class="jumbotron display-2">
    <h2>Overcome your limits, become awesome</h2>
  </div>
  <div class="Section3 p-5 text-right">
    <h3>No gym? NO PROBLEM!</h3>
    <p>
      Not everything can be done in the gym and O.F. believes you can do anything without a gym membership while still getting in shape! If you have space in your place and minimal equipment (dumbbells, fitness ball, a towel), you can become a better you in no time flat with our workout programs.
      And why stop there? We've got plans for people who have living room space, a gym membership, even playgrounds!  There's no place where there isn't space... except the bathroom, that's just weird.
    </p>
  </div>
</section>
<section id="signup" class="container text-center px-5">
  <hr />
  <h2>Sign up for our newsletter!</h2>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          <p>Like what we have to say?  Enjoy inane ramblings from a madman?  Want your computer fixed while you sweat?  Sign up now!</p>
          <input class="form-control-lg form-control" type="text" name="name" placeholder="Name" value="<?php if(isset($error)){echo $name;}?>"/><br />
          <input class="form-control-lg form-control" type="email" name="email" placeholder="E-Mail Address" value="<?php if(isset($error)){echo $email;}?>" />
          <br />
          <button type="submit" name="Register" class="btn btn-primary btn-rounded">Newsletter Go!</button>
        </div>
      </form>
</section>
<!-- first page content ends -->
