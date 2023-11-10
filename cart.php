<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="css/cart.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
 $(document).ready(function() {
  // show info form on page load
  showInfoForm();

  // toggle form display on button click
  $('.info-button').click(function() {
    showInfoForm();
    $('.message-form').hide(); // hide message form when info form is opened
    $('.product-form').hide(); // hide product form when info form is opened
    $('.info-button').addClass('selected'); // add class to show selected button
    $('.message-button').removeClass('selected'); // remove class from other buttons
    $('.product-button').removeClass('selected');
  });

  $('.message-button').click(function() {
    showMessageForm();
    $('.info-form').hide(); // hide info form when message form is opened
    $('.product-form').hide(); // hide product form when message form is opened
    $('.message-button').addClass('selected'); // add class to show selected button
    $('.info-button').removeClass('selected'); // remove class from other buttons
    $('.product-button').removeClass('selected');
  });

  $('.product-button').click(function() {
    showProductForm();
    $('.info-form').hide(); // hide info form when product form is opened
    $('.message-form').hide(); // hide message form when product form is opened
    $('.product-button').addClass('selected'); // add class to show selected button
    $('.info-button').removeClass('selected'); // remove class from other buttons
    $('.message-button').removeClass('selected');
  });
});

function showInfoForm() {
  $('.info-form').show();
  $('.message-form').hide();
  $('.product-form').hide();
  $('.info-button').addClass('selected');
  $('.message-button').removeClass('selected');
  $('.product-button').removeClass('selected');
}

function showMessageForm() {
  $('.message-form').show();
  $('.info-form').hide();
  $('.product-form').hide();
  $('.message-button').addClass('selected');
  $('.info-button').removeClass('selected');
  $('.product-button').removeClass('selected');
}

function showProductForm() {
  $('.product-form').show();
  $('.info-form').hide();
  $('.message-form').hide();
  $('.product-button').addClass('selected');
  $('.info-button').removeClass('selected');
  $('.message-button').removeClass('selected');
}

</script>
</head>
<body>
    <div class="main">
    <div class="btns">
                        <button class="info-button selected" onclick="showInfoForm()"><b>My Info</b></button>
                        <button class="message-button"  onclick="showMessageForm()"><b>Message</b></button>
                        <button class="product-button" onclick="showProductForm()"><b>My Cart</b></button>
                        <button class="logout" style="font-weight:bolder"><a href="session_logout.php">logout</a></button>
                    </div><br><hr>

<?php
    session_start();
    $id=$_SESSION["id"];
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
        $sql="SELECT * FROM user_data WHERE id=$id "; 
        $result=mysqli_query($con,$sql);
        $count=mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        ?>
      <div class="info-form">
      <div style="text-align:center; text-weight:bolder; font-size: 30px;"> <?php echo "welcome ". $_SESSION['name']; echo " ".$_SESSION['surname'];?></div>
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


<div class="product-form" >
        <?php
        
        $query1="SELECT * FROM claims WHERE u_id=$id ORDER BY claim_id DESC"; 
             
        if($result1=mysqli_query($con,$query1))
        {  if(mysqli_num_rows($result1)>0)
            {?>
                <h3><p>Products Claimed</p></h3>
                
                <?php 
                    while ($row1=mysqli_fetch_array($result1)) 
                    {   $p_id=$row1['p_id'];
                        $claim=$row1['status'];
                        if($claim==NULL){$status="Waiting..";}
                        elseif($claim==1){$status="Accepted";}
                        else{$status="Rejected";}
        
                        $query="SELECT * FROM product_data WHERE p_id=$p_id"; 
                        if($result=mysqli_query($con,$query))
                        {  if(mysqli_num_rows($result)>0)
                            {

                                    while ($row=mysqli_fetch_array($result)) 
                                    {   $check=$row["deleted"];
                                                                                                
                                         ?>
                                         
                                        <table>
                                        <tr>
                                            <?php if(isset($check)){ echo "This product is claimed";}
                                                         else{   ?>
                                            <td class="text-center" width="30%" align="center"><p><b><div style="text-transform:uppercase;"><?php echo $row['title']; ?></div></b></p></td>
                                            <td class="text-center" width="30%" align="center"><p><?php echo "Category: ".$row['category']; ?></p></td>
                                            <td class="text-center" width="30%" align="center"><p><b><?php echo "Price: ".$row['price']."/- </b><br>(In rupee)"; ?></p></td>
                                            <?php } ?>
                                            <td class="text-center" width="30%" align="center"><p><?php echo "Status: <b>".$status."<b>"; ?></p></td>

                                            
                                        </tr>
                                        </table>
                                        
                                        <?php 
                                    }?>
                                
                                <?php
                                mysqli_free_result($result);
                            
                            }
                            
                        }    
                    }  
            } 
            else
                {
                    echo "No matching records are found";
                }
        }
    } 
?>
</div>
<div class="message-form" >
<form  method="POST" action="">
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
    <button type="submit" name="submit" class="registerbtn">Submit</button>
</form>
</div>
</div>
</body>
</html>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'vendor/autoload.php';
    if(isset($_POST['submit']))
    { 
    $to=$_POST['to'];
    $from=$_POST['from'];
    $subject=$_POST['subject'];
    $type=$_POST['type'];
    $msg=$_POST['body'];
    date_default_timezone_set("Asia/Kolkata");
    $date=date("Y-m-d");
    $time=date("h:i:s a");

    $mail = new PHPMailer(true);

    $con = mysqli_connect("localhost","root","","swapshop_next");
    $sql="INSERT INTO `msg`( `u_id`, `email`, `subject`, `type`, `msg`, `date`, `time`) 
    VALUES ('$id','$from','$subject','$type','$msg','$date','$time')";
    $result=mysqli_query($con,$sql);
                
    if($result) 
        {
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
                $mail->setFrom($from, $name );
            
                //Add a recipient
                $mail->addAddress('swapshop.next@gmail.com', 'swapshop');
            
                //Set email format to HTML
                $mail->isHTML(true);
            
                
            
                $mail->Subject = $subject;
                $mail->Body    = ' <b style="font-size: 20px;">' . $type . '</b><br><p><i>'.$msg.'</i></p><br><p>From:<b>'.$name.' '.$surname.' '.'</b> (user) <b><br>'.$from.'</b> </p><br>';
            
                $mail->send();
                // echo 'Message has been sent';
            
                   
                    
                    if($result) {
                        echo '<script type="text/javascript"> alert("MESSAGE SENT SUCCESFULLY")</script>';
                                }
                    else{ echo '<script type="text/javascript"> alert("DATA NOT SAVED, PLEASE TRY AGAIN LATER")</script>';}
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }    
        }
    else
        { echo '<script type="text/javascript"> alert("DATA NOT SAVED, PLEASE TRY AGAIN LATER")</script>';}
}
?>