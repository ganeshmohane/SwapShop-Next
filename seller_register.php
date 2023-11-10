<html>
    <head>
      <title>Seller_Registeration</title>
      <link rel="stylesheet"  href="css/register.css">
    </head>
    <body>
      <div class="main">
        <div class="form-container">
        <div class="f_form">
        <form method="POST" action=""><center>
        <h2>Registration For Seller </h2></center>
            <p>Login credentials</p>
            <label for="details"></label><br>
            <input type="text" name="s_un" placeholder="Enter your Username" size="12" required/><br>
            <label for="details"></label><br>
            <input type="password" name="s_pw" placeholder="Enter your Password" size="12" required/>
            
            <p>Personal details</p>
            <label for="details"></label><br>
            <input type="text" name="s_name" placeholder="Enter your FirstName" size="12" required/>
            <label for="details"></label><br><br>
            <input type="text" name="s_surname" placeholder="Enter your Lastname" size="12" required/>
            <br><br>
            <div class="dropdown">
            <label for="details"></label>
            <select name="s_gender" required>  
                <option value="">Select your Gender</option>  
                <option value="male">Male</option>  
                <option value="female">Female</option>   
            </select> 
          </div>
           <p>Other details</p><br>
            <label for="details"></label>
            <input type="text" name="s_college" placeholder="Enter your college name" size="12" required/><br>
           </div>

            <div class="s_form">
   
        <center>
          <h2>Registration For User</h2>
        </center>

            <label for="details"></label>
            <input type="text" name="s_stream" placeholder="Enter your persuing degree" size="12" required/><br>
            <label for="details"></label>
            <input type="text" name="s_branch" placeholder="Enter your branch" size="12" required/><br>
            <label for="details"></label>
            <input type="text" name="s_sem" placeholder="Enter semester" size="12" required/><br>

            <p>Contact details</p>
            <label for="details"></label>
            <input type="text" name="s_email" placeholder="Enter your email address" size="12" required/><br>
            <label for="details"></label>
            <input type="text" name="s_phone" placeholder="Enter your phone number" size="12" required/><br>
            <br><center>
            <button type="submit" name="submit" class="registerbtn">Submit</button></center>

        </form>
        </div>
        </div>
      </div> 
    </body>
</html>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$server="sql202.infinityfree.com";
$username="if0_34562582";
$password="LH6pXpZlrH";
$dbname="if0_34562582_swap";
$connection=mysqli_connect($server,$username,$password,$dbname);

$db = mysqli_select_db($connection,$dbname);

if($connection-> connect_error)
{
  die("connection failed:".$connection-> connect_error);
}

if(isset($_POST['submit']))
{ 
  $username=$_POST['s_un'];
  $password=$_POST['s_pw'];
  $name=$_POST['s_name'];
  $surname=$_POST['s_surname'];
  $gender=$_POST['s_gender'];
  $college=$_POST['s_college'];
  $stream=$_POST['s_stream'];
  $branch=$_POST['s_branch'];
  $sem=$_POST['s_sem'];
  $email=$_POST['s_email'];
  $phone=$_POST['s_phone'];

  $mail = new PHPMailer(true);

  $sql="SELECT * FROM seller_register";
  if($result=mysqli_query($connection,$sql))
  {
    if(mysqli_num_rows($result)>0)
    {   $ptr=0;
        while($row=mysqli_fetch_array($result))
        {
            if($username==$row["s_username"]){$ptr=1;}
        }
    }
  }
if($ptr!=1){
  
  try {
    //Enable verbose debug output
    $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

    //Send using SMTP
    $mail->isSMTP();

    //Set the SMTP server to send through
    $mail->Host = 'smtp.gmail.com';

    //Enable SMTP authentication
    $mail->SMTPAuth = true;

    //SMTP username
    $mail->Username = 'swapshop.next@gmail.com';

    //SMTP password
    $mail->Password = 'pejvmsudgytfcqhs';

    //Enable TLS encryption;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('swapshop.next@gmail.com', 'swapshop');

    //Add a recipient
    $mail->addAddress($email, $name);

    //Set email format to HTML
    $mail->isHTML(true);

    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    $mail->Subject = 'Email verification';
    $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p><br><p><i>Welcome to Swapshop.<br>We hope you will have a better seller experience.</i></p><br><p>From<br><b>Team SWAPSHOP</b></p>';

    $mail->send();
    // echo 'Message has been sent';
   
    $query="INSERT INTO `seller_register`( `s_username`, `s_password`, `s_firstname`, `s_surname`, `s_gender`, `s_college`, `s_stream`, `s_branch`, `s_sem`, `s_email`, `s_phone`, `s_verification_code`, `s_email_verified_at`) 
    VALUES ('$username','$password','$name','$surname','$gender','$college','$stream','$branch','$sem','$email','$phone','$verification_code',NULL)";
    $result=mysqli_query($connection,$query);
    if($result)
    {
      header("Location: s_email_verification.php?email=" . $email);
      exit();
    }
    else
    {
      echo '<script type="text/javascript"> alert("DATA NOT SAVED, PLEASE TRY AGAIN LATER")</script>';
    }
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else{ echo '<script type="text/javascript"> alert("The username is already taken.Try different one.")</script>';}
}

?>
