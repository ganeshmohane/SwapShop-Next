<?php
session_start();
?>
<html>
    <head>
        <title>Homepage</title>
        <link rel="stylesheet" href="css/home_page.css">
    </head>
    <body>
    <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <a href="home_page.php"><img src="img/logo.png" alt="SWAPSHOP" width="250px" /></a>
        </div>
        <div class="search">
                            <center><form method="POST" action="search_mid.php">
                            <input type="text" name="search" placeholder="search here..." size="12" required/>
                            <button type="submit"  class="registerbtn">search</button>
                            </form></center>
            
        </div>
        <nav>
          <ul id="MenuItems">
            <li><a href="home_page.php">Home</a></li>
            <li><a href="books.php">Products</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="cart.php">My Account</a></li>
          </ul>
        </nav>
        <a href="cart.php"><img src="https://i.ibb.co/PNjjx3y/cart.png" alt="" width="30px" height="30px" /></a>
        <img src="https://i.ibb.co/6XbqwjD/menu.png" alt="" class="menu-icon" onclick="menutoggle()" />
      </div>

  
            <?php 
            
            if (isset($_SESSION['username'])) 
                    {    ?>
                     

                    
                       




<div class="w3-content w3-section" style="width:auto; border:2px solid #4f0079;">
  <img class="mySlides" src="img/seller2.jpg" style="width:100%">
  <img class="mySlides" src="img/SELL.png" style="width:100%">
  <img class="mySlides" src="img/swap.png" style="width:100%">
  <img class="mySlides" src="img/wlc.jpg" style="width:100%">
  <img class="mySlides" src="img/logo.png" style="width:100%">
  <img class="mySlides" src="img/seller.jpg" style="width:100%">
  <img class="mySlides" src="img/swap2.jpg" style="width:100%">
  <img class="mySlides" src="img/swap3.jpg" style="width:100%">
</div>

<div class="row">
        <div class="col-2">
          <h1>
            Swap your  <br />
            stuffs
            
          </h1>
          <p>
          SwapShop - the student-to-student platform for buying and selling books and study materials!

          </p>
          <a href="books.php"  class="btn">Explore Now </a>
        </div>

  <!-- Featured products -->
  <div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">

      <div class="col-4">
        <a href="D:\study\swapshop_next\img\math 3.webp">
            <img src="D:\study\swapshop_next\img\dlca.webp" alt="" /></a>
           <h4>DLCA</h4>
        </a>
        <p>₹500.00</p>
      </div>

      <div class="col-4">
        <img src="D:\study\swapshop_next\img\dsgt.webp" alt="" />
        <h4>DSGT </h4>
        <p>₹500.00</p>
      </div>

      <div class="col-4">
        <img src="D:\study\swapshop_next\img\math 3.webp" alt="" />
        <h4>Maths-3</h4>
        <p>₹500.00</p>
      </div>

      <div class="col-4">
        <img src="img/dlca.webp" alt="" />
        <h4>DLCA</h4>
        <p>₹500.00</p>
      </div>
    </div>

  <!-- Testimonial -->
  <div class="testimonial">
    <h2 style="text-align:center">Founders</h2>
    <div class="small-container">
      <div class="row">

        <div class="col-3">
          <i class="fas fa-quote-left"></i>
          <img src="" alt="" />
          <h3>Aaditya Prajapati</h3>
        </div>

        <div class="col-3">
          <i class="fas fa-quote-left"></i>
          <img src="" alt="" />
          <h3>Anuj MIshra</h3>
        </div>

        <div class="col-3">
          <i class="fas fa-quote-left"></i>
          <img src="" alt="" />
          <h3>Ganesh Mohane</h3>
        </div>

        <div class="col-3">
          <i class="fas fa-quote-left"></i>
          <img src="" alt="" />
          <h3>Yashwardhan Pandey</h3>
        </div>

      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <div  class="footer">
    <div  class="container">
      <div class="row">
        <div class="footer-col-4">
        <h3>Visit Now</h3>
          <ul>
            <li href="about.php">About</li>
            <li href="contact.php">Contact</li>
            <li href="seller_register.php">Become Seller</li>
            <li href="cart.php">My Account</li>
          </ul>
        </div>

        <div class="footer-col-2">
          <img src="img/logo.png" alt="" />
          <p>
            Our objective is to build a platform where every student can buy and sell or share there old books and stationaries easily and at affordable price.
          </p>
        </div>

        

        <div class="footer-col-4">
          <h3>Follow us</h3>
          <ul>
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Instagram</li>
            <li>YouTube</li>
          </ul>
        </div>
      </div>
      <hr />
      <p class="copyright">Copyright &copy; 2023 - Swapshop</p>
    </div>
  </div>

                        
            <?php   }                      
            else 
                    { ?>
                        <h3>You have been LOGGED OUT !!</h3>
                        <h3>LOGIN First !!</h3>
            <?php
                    }   
            ?>


        <script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000); 
}
</script>
    </body>
</html>