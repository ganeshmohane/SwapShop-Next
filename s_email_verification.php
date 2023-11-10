<html>
  <head>
    <title>Verification</title>
    <link rel="stylesheet"  href="css/s_email_verification.css">
  </head>
    <body>
        <div class="main_sv">
            <div class="form_sv">
              <form method="POST">
                <div class="sv_h2">
                  <h2>Seller Email Verification</h2></div>
                  <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
                  <input type="text" name="verification_code" class="form_ip_sv" placeholder="Enter verification code" required /><br><br>
                  <button type="submit" name="verify_email" class="registerbtn_sv">Verify Email</button>
             </form>
         </div>
      </div>
    </body>
</html>
<?php

    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];

        // connect with database
        $server="sql202.infinityfree.com";
        $username="if0_34562582";
        $password="LH6pXpZlrH";
        $dbname="if0_34562582_swap";
        $con = mysqli_connect($server,$username,$password,$dbname);

        // mark email as verified
        $sql = "UPDATE seller_register SET s_email_verified_at = NOW() WHERE s_email = '$email' AND s_verification_code = '$verification_code'";
        $result  = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 0)
        {
            die("Incorrect Verification code <br> Try to add correct code.");
        }

        echo '<script type="text/javascript"> alert("Registered succesfully!")</script>';
        Header('Location:login_page.php');
        exit();
    }

?>