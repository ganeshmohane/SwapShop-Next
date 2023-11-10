
<!DOCTYPE html>
<head>
    <title>CONTACT US</title>
    <link rel="stylesheet" href="css/contact.css">

</head>
<body>
    <div class="main">
        <div class="header">
          <h1>CONTACT US</h1><hr>
        </div>
     <div class="form">
    <form method="post" action="">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required>

		<label for="subject">Subject:</label>
		<input type="text" name="subject" id="subject" required>

		<label for="message">Message:</label>
		<textarea name="message" id="message" rows="5" required></textarea>

		<button type="submit" name="submit" id="submit">SUBMIT</button>
	</form>
   </div>
  </div>
 </body>
</html>


<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$server="sql202.infinityfree.com";
$username="if0_34562582";
$password="LH6pXpZlrH";
$dbname="if0_34562582_swap";
$connection = mysqli_connect($server,$username,$password,$dbname);
$db = mysqli_select_db($connection,'swapshop_next');


if($connection-> connect_error)
{
  die("connection failed:".$connection-> connect_error);
}

if(isset($_POST['submit']))
{ 
  // Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'swapshop.next@gmail.com';                     // SMTP username
    $mail->Password   = 'pejvmsudgytfcqhs';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress( $email,$name);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo 'Message has been sent';
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
