<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/login.css">
    <title>SWAPSHOP</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 </head>
    <body>
    
      <div class="main">
          <div class="navbar">
             <div class="icon"><h2 class="logo">SWAPSHOP</h2> </div>
                     <div class="menu">
                       <ul>
                         <li><a href="about.php">ABOUT US</a></li>
                         <li><a href="contact.php">CONTACT US</a></li>
                         <li><a href="admin_login.php">ADMIN</a></li>
                       </ul>
                     </div>
           </div> 

         <div class="content">
         <h1><i>Welcome to</i><br><span style="color:black;"><u>SWAPSHOP !!!</u></span><br></h1><br>
<p class="par">Looking for an online platform to buy and sell study materials at an affordable price? <br>Look no further than <u style="color:#4F0079"> SwapShop! </u> <br>So why wait? Join SwapShop today and start swapping!</p>
<button class="cn"><a href="user_register.php">JOIN US</a></button>

                
            <div class="form">
                <h2>Login As</h2><br>
                    <div class="btns">
                        <button class="user-button selected" onclick="showUserLoginForm()"><b>USER</b></button>
                        <button class="seller-button"  onclick="showSellerLoginForm()"><b>SELLER</b></button>
                    </div>

                 <div class="login-form">
                     <form method="POST" action="session_userlogin.php" id="user-form">
                        <h3 style="text-align:center; color:black; text-decoration:underline">USER LOGIN</h3>
                        <label for="details">Username</label>
                        <input type="text" name="un" placeholder="Enter your Username" size="12" required/><br>
                        <label for="details">Password</label>
                        <input type="text" name="pw" placeholder="Enter your Password" size="12" required/><br><br>
                        <p style="color:black;">Don't have an account? <a href="user_register.php" style="color:#4F0079">Create Your Account</a> it takes less than a minute</p>
                        <br>
                        <button type="submit" name="login" class="registerbtn">LOGIN</button>
                     </form>

                     <form method="POST" action="session_sellerlogin.php" id="seller-form"  style="display: none;" >
                        <h3 style="text-align:center; color:black; text-decoration:underline">SELLER LOGIN</h3>
                        <label for="details">Username</label>
                        <input type="text" name="un" placeholder="Enter your Username" size="12" required/>
                        <label for="details">Password</label>
                        <input type="text" name="pw" placeholder="Enter your Password" size="12" required/><br><br>
                        <p style="color:black;">Don't have Seller account?   <a href="seller_register.php" style="color:#4F0079"> Create Seller Account </a> & Become a seller </p><br>
                        <button type="submit" name="login" class="registerbtn">LOGIN</button>
                     </form>
                 </div>

                 <script>
                         function showUserLoginForm() {
                          $('#user-form').show();
                          $('#seller-form').hide();
                          $('.user-button').addClass('selected');
                          $('.seller-button').removeClass('selected');
                          }

                         function showSellerLoginForm() {
                          $('#user-form').hide();
                          $('#seller-form').show();
                          $('.user-button').removeClass('selected');
                          $('.seller-button').addClass('selected');
                          }
                 </script>
            </div>
        </div>
    </body>
</html>