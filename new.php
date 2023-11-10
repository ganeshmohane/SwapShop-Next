<?php
   session_start();
   
   ?>
<html>
   <head>
   <title>Seller Dashboard</title>
     <link rel="stylesheet" href="css/new.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
 $(document).ready(function() {
  // show info form on page load
  showInfoForm();

  // toggle form display on button click
  $('.info-button').click(function() {
    showInfoForm();
    $('.message-form').hide(); // hide message form when info form is opened
    $('.addp-form').hide(); // hide add product form when info form is opened
    $('.listp-form').hide(); // hide product list form when info form is opened
    $('.listu-form').hide(); // hide claims list form when info form is opened
    $('.info-button').addClass('selected'); // add class to show selected button
    $('.message-button').removeClass('selected'); // remove class from other buttons
    $('.addp-button').removeClass('selected');
    $('.listp-button').removeClass('selected');
    $('.listu-button').removeClass('selected');
  });

  $('.message-button').click(function() {
    showMessageForm();
    $('.info-form').hide(); // hide info form when message form is opened
    $('.addp-form').hide(); // hide add product form when message form is opened
    $('.listp-form').hide(); // hide product list form when message form is opened
    $('.listu-form').hide(); // hide claims list form when message form is opened
    $('.message-button').addClass('selected'); // add class to show selected button
    $('.info-button').removeClass('selected'); // remove class from other buttons
    $('.addp-button').removeClass('selected');
    $('.listp-button').removeClass('selected');
    $('.listu-button').removeClass('selected');
  });

  $('.addp-button').click(function() {
    showAddPForm();
    $('.info-form').hide(); // hide info form when add product form is opened
    $('.message-form').hide(); // hide message form when add product form is opened
    $('.listp-form').hide(); // hide product list form when add product form is opened
    $('.listu-form').hide(); // hide claims list form when add product form is opened
    $('.addp-button').addClass('selected'); // add class to show selected button
    $('.info-button').removeClass('selected'); // remove class from other buttons
    $('.message-button').removeClass('selected');
    $('.listp-button').removeClass('selected');
    $('.listu-button').removeClass('selected');
  });

  $('.listp-button').click(function() {
    showListPForm();
    $('.info-form').hide(); // hide info form when product list form is opened
    $('.message-form').hide(); // hide message form when product list form is opened
    $('.addp-form').hide(); // hide add product form when product list form is opened
    $('.listu-form').hide(); // hide claims list form when product list form is opened
    $('.listp-button').addClass('selected'); // add class to show selected button
    $('.info-button').removeClass('selected'); // remove class from other buttons
    $('.message-button').removeClass('selected');
    $('.addp-button').removeClass('selected');
    $('.listu-button').removeClass('selected');
  });

  $('.listu-button').click(function() {
showListUForm();
$('.info-form').hide(); // hide info form when claims list form is opened
$('.message-form').hide(); // hide message form when claims list form is opened
$('.addp-form').hide(); // hide add product form when claims list form is opened
$('.listp-form').hide(); // hide product list form when claims list form is opened
$('.listu-button').addClass('selected'); // add class to show selected button
$('.info-button').removeClass('selected'); // remove class from other buttons
$('.message-button').removeClass('selected');
$('.addp-button').removeClass('selected');
$('.listp-button').removeClass('selected');
});

// function to show info form
function showInfoForm() {
$('.info-form').show();
}

// function to show message form
function showMessageForm() {
$('.message-form').show();
}

// function to show add product form
function showAddPForm() {
$('.addp-form').show();
}

// function to show product list form
function showListPForm() {
$('.listp-form').show();
}

// function to show claims list form
function showListUForm() {
$('.listu-form').show();
}
});
</script>
      

   </head>
<body>
<div class="main">
   <center><h2>Seller Dashboard</h2></center>
<?php
      if (isset($_SESSION['username'])) 
                 {$id=$_SESSION["id"];?>
     
     <?php 
         if (isset($_SESSION['username'])) 
                 {    ?>
      <div style="text-align:center; text-weight:bolder; font-size: 30px;">
         <?php echo "welcome ". $_SESSION['name']; echo " ".$_SESSION['surname'];?><br>
         
      </div>
      <?php 
         $server="sql202.infinityfree.com";
         $username="if0_34562582";
         $password="LH6pXpZlrH";
         $dbname="if0_34562582_swap";
         $con = mysqli_connect($server,$username,$password,$dbname);
         if (mysqli_connect_errno())
         {
             echo "Failed to connect to MySQL: " . mysqli_connect_error();
         }
         else
         {
                 ?>

    
    <div class="btns">
                        <button class="info-button selected" onclick="showInfoForm()"><b>My Info</b></button>
                        <button class="message-button"  onclick="showMessageForm()"><b>Message</b></button>
                        <button class="addp-button" onclick="showaddpForm()"><b>Add product</b></button>
                        <button class="listp-button" onclick="showlistpForm()"><b>Products</b></button>
                        <button class="listu-button" onclick="showlistuForm()"><b>Claims</b></button>
                        <button class="logout" style="font-weight:bolder"><a href="session_logout.php">logout</a></button>
                    </div><br><hr><br>

           
           
           
           
      
                    <div class="info-form">
         <?php echo "welcome ". $_SESSION['name']; echo " ".$_SESSION['surname'];?>
  <h3><b><i><?php echo"".$row["firstname"];echo" ".$row["surname"];echo"'s Cart";?></i></b></h3>
  <hr>
  <div class="left-column">
    <p><label>Username:</label> <?php echo $row["username"];?></p>
    <p><label>Gender:</label> <?php echo $row["gender"];?></p>
    <p><label>College:</label> <?php echo $row["college"];?></p>
    <p><label>Stream:</label> <?php echo $row["stream"];?></p>
    <p><label>Branch:</label> <?php echo $row["branch"];?></p>
  </div>
  <div class="right-column">
    <p><label>Semester:</label> <?php echo $row["sem"];?></p>
    <p><label>Email Id:</label> <?php echo $row["email"];?></p>
    <p><label>Phone No:</label> <?php echo $row["phone"];?></p>
    <p><label>Verified:</label> <?php echo $row["email_verified_at"] ? 'Yes' : 'No';?></p>
  </div>
  <div class="clear"></div>
  <hr>
</div>



<div class="addp-form" style="display:none" >
         <div class="form">
            <center>
               <h2>Add product</h2>
            </center>
            <div style="text-align:center">
               <form method="POST" action="" enctype="multipart/form-data">
                  <label for="details"></label><br>
                  <input type="text" name="title" placeholder="Enter the Title of product" size="12" required/><br>
                  <label for="details"></label><br>
                  <input type="text" name="category" placeholder="Enter product category" size="12" required/><br>
                  <label for="details"></label><br>
                  <input type="text" name="price" placeholder="Enter product price" size="12" required/><br>
                  <label for="details"></label><br>
                  <input name="desc" placeholder="Enter Product Details here" class="form-control" list="desc" required></textarea><br>
                  <label for="details"></label><br>
                  <input class="form-control" type="file" name="file" value="" /><br><br>
                  <button type="submit" name="submit" class="registerbtn">Submit</button>
               </form>
            </div>
            <?php
               $connection=mysqli_connect("localhost","root","");
               $db = mysqli_select_db($connection,'swapshop_next');
               
               if($connection-> connect_error)
               {
                 die("connection failed:".$connection-> connect_error);
               }
               
               if(isset($_POST['submit']))
               { 
                 $id=$_SESSION['id'];
                 $title=$_POST['title'];
                 $category=$_POST['category'];
                 $price=$_POST['price'];
                 $desc=$_POST['desc'];
                 $filename = $_FILES["file"]["name"];
                 $tempname = $_FILES["file"]["tmp_name"];
                 $folder = "./img/" . $filename;
                 
                  
                   $query="INSERT INTO `product_data`( `s_id`, `title`, `category`, `price`, `descriptions`, `image`) 
                   VALUES ('$id','$title','$category','$price','$desc','$filename')";
                   $result=mysqli_query($connection,$query);
                   $img_upload=move_uploaded_file($tempname, $folder);
                   
                  //  if () 
                  //  {
               	// 	echo '<script type="text/javascript"> alert("Image uploaded successfully!")</script>';
                  //  } 
                  //  else 
                  //  {
                  //      echo '<script type="text/javascript"> alert(" Failed to upload image!")</script>';
                  //  }
                   
                   if ($result && $img_upload) 
                   {
                       echo '<script type="text/javascript"> alert("  uploaded successfully!")</script>';
                   } 
                   else 
                   {
                       echo '<script type="text/javascript"> alert(" Failed to fill data")</script>';
                   }
               }
               
               ?>
         </div>

      </div>




      <div class="listp-form" style="display:none; background-color:white; border:2px solid #4F0079;">
      <center>
         <h2>List of added products</h2>
      </center><?php
      $id=$_SESSION["id"];
             $sql="SELECT * FROM product_data WHERE s_id=$id ORDER BY p_id DESC"; 
             
             if($result=mysqli_query($con,$sql))
             {  if(mysqli_num_rows($result)>0)
                 { ?>
                 <center>
      <table >
         <tr>
            <th class="text-center">PRODUCT IMAGE</th>
            <th class="text-center" width="25%">TITLE</th>
            <th class="text-center" width="25%">CATEGORY</th>
            <th class="text-center" width="25%">PRICE</th>
            
         </tr>
         <?php
            while ($row=mysqli_fetch_array($result)) 
            { $check=$row["deleted"];
                if(isset($check)){}
                 else{                                       
                ?>
         <tr>
            <td class="text-center" align="center"><img src="img/<?php echo $row['image']; ?>" width="150px"></td>
            <td class="text-center" align="center" width="25%">
               <b>
                  <div style="text-transform:uppercase;">
                  <?php echo $row['title']; ?>
                  <div>
               </b>
            </td>
            <td class="text-center" align="center" width="25%"><?php echo $row['category']; ?></td>
            <td class="text-center" align="center" width="25%"><b><?php echo $row['price']."/- </b><br>(In rupee)"; ?></td>
         </tr>
         <?php }
            }?>
      </table></center>
      <?php
         mysqli_free_result($result);
         
         }
         else
         {
             echo "No Product is added";
         }
         }?><br><hr>
      </div>




      <div class="listu-form"style="display:none; background-color:white; border:2px solid #4F0079;" >
      <center>
         <h2>List of user claims</h2>
      </center>
         <?php
            $query1="SELECT * FROM claims WHERE s_id=$id ORDER BY claim_id DESC"; 
            
            if($result1=mysqli_query($con,$query1))
            {  if(mysqli_num_rows($result1)>0)
                { ?>
         <table>
            <?php
               while ($row1=mysqli_fetch_array($result1)) 
               {   $u_id=$row1["u_id"];
                   $p_id=$row1["p_id"];
                   $claim_id=$row1["claim_id"];
                   $date=$row1["date"];
                   $time=$row1["time"];
                   
               
                   $sql="SELECT * FROM product_data WHERE p_id=$p_id "; 
                   $result2=mysqli_query($con,$sql);
                   $row2=mysqli_fetch_array($result2);
                   $title=$row2["title"];

                  $sql="SELECT * FROM claims WHERE claim_id=$claim_id "; 
                  $result2=mysqli_query($con,$sql);
                  $row2=mysqli_fetch_array($result2);  
                  $status=$row2["status"];
                   
               
               
                   $query="SELECT * FROM user_data WHERE id=$u_id"; 
                   if($result=mysqli_query($con,$query))
                   {  if(mysqli_num_rows($result)>0)
                       {
               
                               while ($row=mysqli_fetch_array($result)) 
                               { 
                                   ?>
                                    <tr>
                                       <td class="text-center" width="30%" align="center">
                                          <p>
                                             <b>
                                          <div style="text-transform:uppercase;"><?php echo $title; ?></div></b></p>
                                       </td>
                                       <td class="text-center" width="30%" align="center">
                                          <p><?php echo "User name: ".$row['firstname']." ".$row['surname']; ?></p>
                                       </td>
                                       <td class="text-center" width="30%" align="center">
                                          <p><?php echo " ".$row['email']."<br> ".$row['phone']; ?></p>
                                       </td>
                                       <td class="text-center" width="30%" align="center">
                                          <p><?php echo "Date: ".$date."<br>Time: ".$time; ?></p>
                                       </td>
                                       <td class="text-center" width="30%" >
                                          <?php if($status==NULL){?>
                                          <form method="POST" action="claim_acceptance_by_seller.php?claim_id=<?php echo $claim_id;?>">
                                             <button type="submit" name="submit" class="registerbtn">Accept claim</button>
                                          </form>
                                          <?php }
                                          else if($status==1)
                                          { ?><h2 ><p color="green">Accepted</p></h2><?php }
                                          else{ ?><h2 ><p color="red">Rejected</p></h2><?php }?>
                                       </td>
                                    </tr>
                                    <?php 
                                 }?>
      </div>


      <?php
         mysqli_free_result($result);
         
         }
         
         }    
         }  
         ?></table><?php } 
         else
             {
                 echo "No Claims till now";
             }
         }
         
         }
          }                      
         
         ?>
      </div>



     <div class="message-form" style="display:none">
<form  method="POST" action=""><center>
    <h2>Grievance & Suggestions</h2>
    <label>To</label><br>
    <input type="text" name="to" placeholder="swapshop.next@gmail.com" size="20" value="swapshop.next@gmail.com" required/><br>
    <label>From</label><br>
    <input type="email" name="from" placeholder="your email id" size="20" required/><br>
    <label for="subject">Subject:</label><br>
    <input type="text" name="subject" placeholder="write subject" size="20" required/><br><br><label>
    <input type="radio" name="type" placeholder="Grievance" value="Grievance" required/>Grievance
    <input type="radio" name="type" placeholder="Suggestion" value="Suggestion" required/>Suggestion</label>
    <label>message</label><br>
    <input type="text-box" name="body" placeholder="Explain your Grievance or Suggestions in 500 words" size="50" required/><br><br>
    <button type="submit" name="submit" class="registerbtn">Submit</button></center>
</form>
</div>
      <?php
      }
      else 
                 { ?>
                 <div style="text-align:center; color:red; text-weight:bolder; text-decoration:underline;">
      <h3>You have been LOGGED OUT from dashboard !!</h3>
      <h3>LOGIN First !!</h3></div>
      <?php
         }  ?> 


   </body>
</html>

