<html>
    <body>
        <form method="POST">
        <input type="email" name="email" placeholder="Enter email" required />
        <input type="password" name="password" placeholder="Enter password" required />

        <input type="submit" name="login" value="Login">
        </form>
    </body>
</html>

<?php
    
    if (isset($_POST["login"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // connect with database
        $conn = mysqli_connect("localhost","root","","test");
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else
        {
        // check if credentials are okay, and email is verified
            $sql = "SELECT * FROM 'users' WHERE email ='$email'";
            $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0)
        {
            die("Email not found.");
        }

        $user = mysqli_fetch_object($result);

        if (!password_verify($password, $user->password))
        {
            die("Password is not correct");
        }

        if ($user->email_verified_at == null)
        {
            die("Please verify your email <a href='xemail_verification.php?email=" . $email . "'>from here</a>");
        }
        }
        echo "<p>Your login logic here</p>";
        exit();
    }
?>