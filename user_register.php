<html>
    <head>
      <title>User_Registration</title>
      <link rel="stylesheet" href="css/register.css">
    </head>
    <body>
      <div class="main">
  <div class="forms-container">
    <div class="f_form">
      <form method="POST" action="">
        <center>
          <h2>Registration For User</h2>
        </center>
        <p>Login credentials</p>
        <label for="details">Username</label><br>
        <input type="text" name="un" placeholder="Enter your Username" size="12" required /><br>
        <label for="details">Password</label><br>
        <input type="password" name="pw" placeholder="Enter your Password" size="12" required />

        <p>Personal details</p>
        <label for="details">Firstname</label><br>
        <input type="text" name="u_name" placeholder="Enter your FirstName" size="12" required /><br>
        <label for="details">Lastname</label><br>
        <input type="text" name="u_surname" placeholder="Enter your Lastname" size="12" required /><br><br>
        <div class="dropdown">
          <label for="details">Gender</label>
          <select name="gender" required>
            <option value="">Select your Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <p>Other details</p><br>
        <label for="details">College</label>
        <input type="text" name="college" placeholder="Enter your college name" size="12" required /><br>
      
    </div>

    <div class="s_form">
   
        <center>
          <h2>Registration For User</h2>
        </center>
       
        <label for="details">Degree</label>
        <input type="text" name="stream" placeholder="Enter your persuing degree" size="12" required /><br>
        <label for="details">Branch</label>
        <input type="text" name="branch" placeholder="Enter your branch" size="12" required /><br>
        <label for="details">SEM</label>
        <input type="text" name="sem" placeholder="Enter semester" size="12" required /><br>

        <p>Contact details</p>
        <label for="details">Email</label>
        <input type="text" name="email" placeholder="Enter your email address" size="12" required /><br>
        <label for="details">Ohone Number</label>
        <input type="text" name="phone" placeholder="Enter your phone number" size="12" required /><br><br>
        <center>
          <button type="submit" name="submit" class="registerbtn">Submit</button>
        </center>
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
$connection = mysqli_connect($server,$username,$password,$dbname);
$db = mysqli_select_db($connection,'if0_34562582_swap');
if($connection-> connect_error)
{
  die("connection failed:".$connection-> connect_error);
}

if(isset($_POST['submit']))
{ 
  $username=$_POST['un'];
  $password=$_POST['pw'];
  $name=$_POST['u_name'];
  $surname=$_POST['u_surname'];
  $gender=$_POST['gender'];
  $college=$_POST['college'];
  $stream=$_POST['stream'];
  $branch=$_POST['branch'];
  $sem=$_POST['sem'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];

  $mail = new PHPMailer(true);
  
  $sql="SELECT * FROM user_data";
  if($result=mysqli_query($connection,$sql))
  {
    if(mysqli_num_rows($result)>0)
    {   $ptr=0;
        while($row=mysqli_fetch_array($result))
        {
            if($username==$row["username"]){$ptr=1;}
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
    $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p><br><p><i>Welcome to Swapshop.<br>We hope you will have a better user experience.</i></p><br><p>From<br><b>Team SWAPSHOP</b></p>';

    $mail->send();
    // echo 'Message has been sent';

        $query="INSERT INTO `user_data`( `username`, `password`, `firstname`, `surname`, `gender`, `college`, `stream`, `branch`, `sem`, `email`, `phone`, `verification_code`, `email_verified_at`) 
        VALUES ('$username','$password','$name','$surname','$gender','$college','$stream','$branch','$sem','$email','$phone','$verification_code',NULL)";
        $result=mysqli_query($connection,$query);
        
        if($result) {
                        header("Location: u_email_verification.php?email=" . $email);
                        exit();
                    }
        else{ echo '<script type="text/javascript"> alert("DATA NOT SAVED, PLEASE TRY AGAIN LATER")</script>';}
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}    
}
else{ echo '<script type="text/javascript"> alert("The username is already taken.Try different one.")</script>';}
}
?>
