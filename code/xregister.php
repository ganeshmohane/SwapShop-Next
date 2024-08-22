<html>
    <body>
        <form method="POST">
        <input type="text" name="name" placeholder="Enter name" required />
        <input type="email" name="email" placeholder="Enter email" required />
        <input type="password" name="password" placeholder="Enter password" required />

        <input type="submit" name="register" value="Register">
        </form>
    </body>
</html>

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST["register"]))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

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
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        $mail->send();
        // echo 'Message has been sent';

        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "test");
       
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else
        {

            // insert in users table
            $sql="INSERT INTO `users`(`name`, `email`, `password`, `verification_code`, `email_verified_at`) VALUES ('$name','$email','$encrypted_password','$verification_code',NULL)";
            $x=mysqli_query($conn, $sql);
            if($x){
            header("Location: xemail_verification.php?email=" . $email);
            exit();}
            else{ echo "data not send";}
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>