<html>
    <head>
    <link rel="stylesheet" href="css/admin_login.css">
    </head>
    <body>
      <div class="main">
        <div class="form">
            <h2>Admin Login</h2><br>
            <form method="POST" action="session_adminlogin.php">
                     
                <label for="details">Username</label>
                <input type="text" name="un" placeholder="Enter your Username" size="12" required/><br>
                        
                <label for="details">Password</label>
                <input type="text" name="pw" placeholder="Enter your Password" size="12" required/><br><br>
       
                <button type="submit" name="login" class="registerbtn">LOGIN</button>
                   
            </form> 
        </div>
      </div>
    </body>
</html>